<header class="header bg-light lt b-b b-light">
    <p class="h4 font-thin pull-left m-r m-b-sm"><i class="i i-file-zip"></i> <?php echo $title?></p>
 
</header>
<?php if(isset($error) && $error):?>
    
    <div class="clearfix"></div>
    
    <div class="wrapper">

        <div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="h2 font-thin text-center"><?php echo $error;?></p>
        </div>

        <div class="clearfix"></div>

    </div>

    <div class="clearfix"></div>

<?php endif;?>
    
    <div class="clearfix"></div>

 <section style="position: relative; margin-top: -10px;">
    
    <form action="" method="post" enctype="multipart/form-data">
        
        <div class="well-padded text-center">
            
            <h1 class="h2 font-thin text-center m-r m-b-sm">Import your new newsletter template here</h1>
            <span class="clearfix"></span>
            
            <p class="h4 font-thin text-center text-success">Please upload your template from a valid <strong>*.zip archive file</strong></p>
            <span class="clearfix"></span>

            <i class="i i-file-zip text-center m-t-md" style="font-size: 130px; color: #8287A9"></i>

            <div class="text-center m-t-lg">

                <input type="file" class="filestyle" data-icon="false" name="userfile" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">

                <div class="clearfix"></div>

                <button type="submit" name="upld_csv" class="btn btn-success btn-lg btn-rounded font-thin m-t-md">Upload Template</button>
                
                <div class="help-block m-t-sm text-muted">
                    Make sure that your zipped folder contains only these file extensions <br/> *.css, *.js, *.png, *.gif, *.jpeg, *.jpg, *.html, *.htm
                </div>
                
            </div>

        </div>
        
    </form>
 
</section>

<div class="clearfix"></div> 
 