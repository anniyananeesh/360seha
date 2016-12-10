<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author 360Seha Team
*/
/* Library service */

Class Category_service{
 
    public function display_list(){
        
        $cat_Obj = new Category_service();
        array_walk( $this->get_order_multidimensional(), array( $cat_Obj, 'show'), $this->get_categories());

    }
    
    public function get_root_categories($show = false)
    {
        
        $where = array(
            TBL_CATEGORY.'.id_category_parent' => NULL,
        );
        
        if($show)
        {
            $where['show_status'] = 1;
        }
        
        $order_by = array(
            TBL_CATEGORY.'.created' => 'DESC'  
        );
        
        return $this->get_categories( $where, $order_by);
    }
    
    public static function get_all_unindexed_categories( $where = array(), $order_by = array(), $limit = null, $offset = null)
    {
        $CI = & get_instance();
        $CI->load->model('category_model');
        
        $order_by = array(
          TBL_CATEGORY.'.created' => 'DESC'  
        );
        
        return $CI->category_model->get_category( $where, $order_by, $limit, $offset);
 
    }
 
    public static function get_categories($where = array(), $order_by = array(), $limit = null, $offset = null){
        
        $CI = & get_instance();
        $CI->load->model('category_model');
        
        $order_by = array(
          TBL_CATEGORY.'.created' => 'DESC'  
        );
        $categories = $CI->category_model->get_category( $where, $order_by, $limit, $offset);
        
        $cats_arr = array();
        foreach ($categories as $cat)
        {
            
            $cats_arr[$cat->id_category] =  array('name'               => $cat->name,
                                                  'name_ar'            => $cat->name_ar, 
                                                  'id_category_parent' => $cat->id_category_parent,
                                                  'type'               => $cat->type,
                                                  'seoname'            => $cat->seoname,
                                                  'id'                 => $cat->id_category,
                                                );
            
        }
        
        return $cats_arr;
    }

    /**
     * we get the categories in an array miltidimensional by deep.
     * @return array 
     */
    public static function get_order_multidimensional()
    {
        
        $CI = & get_instance();
        $CI->load->model('category_model');
        
        $order_by = array(
           TBL_CATEGORY.'.created' => 'DESC'
        );
        $categories = $CI->category_model->get_category( array(), $order_by);

        $cats_s = array();
        foreach ($categories as $cat) 
            $cats_s[$cat->id_category_parent][] = $cat->id_category;

        //last build multidimensional array
        if ( count($cats_s) > 1)
            $cats_m = self::multi_cats($cats_s);
        else
            $cats_m = array();
        
        return $cats_m;
    }
    
    /**
     * gets a multidimensional array wit the categories
     * @param  array  $cats_s      id_category->array(id_siblings)
     * @param  integer $id_category 
     * @param  integer $deep        
     * @return array               
     */
    
    public static function multi_cats( $cats_s, $id_category = 1, $deep = 0)
    {    
        $ret = NULL;
        //we take all the siblings and try to set the grandsons...
        //we check that the id_category sibling has other siblings
        if (isset($cats_s[$id_category]))
        {
            foreach ($cats_s[$id_category] as $id_sibling) 
            {
                //we check that the id_category sibling has other siblings
                if (isset($cats_s[$id_sibling]))
                {
                    if (is_array($cats_s[$id_sibling]))
                    {
                        $ret[$id_sibling] = self::multi_cats( $cats_s, $id_sibling, $deep+1);
                    }
                }
                //no siblings we only set the key
                else 
                    $ret[$id_sibling] = NULL;
                
            }
        }
        return $ret;
    }
    
    
    /*
     * 
     * Move child items to root category after parent is deleted
     * @params $id
     * 
     */
    public function move_child_items($id)
    {
        
        $CI = & get_instance();
        $CI->load->model('category_model');
        
        $where = array(
          TBL_CATEGORY.'.id_category_parent' => $id
        ); 
        
        $save = array(
           TBL_CATEGORY.'.id_category_parent' => 1 
        );
        
        return $CI->category_model->save( $save, $where);

    }
    
    /*
     * Check if the parent category has any children in it
     * @params $parent_id
     * 
     * For more doc ---- See base_model
     */
    public static function has_children($parent_id)
    {
        
        $CI = & get_instance();
        $CI->load->model('category_model');
        
        $order_by = array(
            TBL_CATEGORY.'.created' => 'DESC'  
        );
        
        $where = array(
            
            TBL_CATEGORY.'.id_category_parent' => $parent_id
        );
        
        $categories = $CI->category_model->get_category( $where, $order_by, null, null);
        
        if(count($categories) > 0 && $categories)
        {
            
            return true;
        }else{
            
            return false;
        }
        
    }
    
    /*
     * Check if the category has a parent category
     * @params $id
     * 
     * For more doc -- See base_model
     */
    public function has_parent($id)
    {
        $record = $this->get_category_by_pk($id);
        
        if($record->id_category_parent != 0)
        {
            
            return true;
        }else{
            
            return false;
        }
        
    }


    /*
     * Get category details by pasing the primary key
     * @param $id
     * 
     * For more doc --- see base_model
     */
    public function get_category_by_pk($id)
    {
        
       $CI = & get_instance();
       $CI->load->model('category_model'); 
       
       return $CI->category_model->fetchById( $id);
    }
    
    /*
     * Get category details by pasing the primary key
     * @param $id
     * 
     * For more doc --- see base_model
     */
    public function get_category_by_params($where)
    {
        
       $CI = & get_instance();
       $CI->load->model('category_model'); 
       
       return $CI->category_model->fetchRow( $where);
    }
    
    public function get_parent_category($id)
    {
        
        $record = $this->get_category_by_pk($id);
        return $this->get_category_by_pk($record->id_category_parent);
    }
    
    public function get_children($parent)
    {
        $CI = & get_instance();
        $CI->load->model('category_model');
        
        $order_by = array(
            TBL_CATEGORY.'.created' => 'DESC'  
        );
        
        $where = array(
            
            TBL_CATEGORY.'.id_category_parent' => $parent
        );
        
        return $CI->category_model->get_category( $where, $order_by, null, null);
    }
    
    public function get_children_by_seoname($name)
    {
       $CI = & get_instance();
       $CI->load->model('category_model'); 
       
       $where = array(
           TBL_CATEGORY.'.seoname' => $name
       );
       
       $cat = $CI->category_model->fetchRow( $where);
       
       if($cat){
           
           return $this->get_children($cat->id_category);
       }else{
           
           return false;
       }
    }
    
    public function get_children_by_name($name)
    {
       $CI = & get_instance();
       $CI->load->model('category_model'); 
       
       $where = array(
           TBL_CATEGORY.'.name' => $name
       );
       
       $cat = $CI->category_model->fetchRow( $where);
       
       if($cat){
           
           return $this->get_children($cat->id_category);
       }else{
           
           return false;
       }
    }

    public function isExistData($paramArray)
    {
        $CI = & get_instance();
        $CI->load->model('category_model'); 
        return $CI->category_model->isExistData($paramArray);
    }
}