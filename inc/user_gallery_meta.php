<?php
// Prevent direct file access
if (! defined('ABSPATH')) {
    exit;
}
?>
<div id="gallery_wrapper">
    <div id="img_box_container">
        <?php
            if (isset($gallery_data['image_url']))
             {
                for ($i = 0; $i < count($gallery_data['image_url']); $i++) 
                {
                    ?>
				<div class="gallery_single_row dolu">
					<div class="gallery_area image_container ">
						<img class="gallery_img_img" src="<?php echo esc_url($gallery_data['image_url'][$i]); ?>" height="55px" width="55px" onclick="open_media_uploader_image_this(this)" />
						<input type="hidden" class="meta_image_url" name="gallery[image_url][]"
							value="<?php echo esc_url($gallery_data['image_url'][$i]); ?>" />
					</div>
					<div class="gallery_area">
						<span class="button remove" onclick="remove_img(this)" title="Remove"><i
								class="fas fa-trash-alt"></i></span>
					</div>
					<div class="clear">
					</div>
				</div>
					<?php
                }
            }
            ?>
    </div>
    <div style="display:none" id="master_box">
        <div class="gallery_single_row">
            <div class="gallery_area image_container" onclick="open_media_uploader_image(this)">
                <input class="meta_image_url" value="" type="hidden" name="gallery[image_url][]" />
            </div>
            <div class="gallery_area">
                <span class="button remove" onclick="remove_img(this)" title="Remove"><i
                        class="fas fa-trash-alt"></i></span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="add_gallery_single_row">
        <input class="button add" type="button" value="+" onclick="open_media_uploader_image_plus();"
            title="Add image" />
    </div>
</div>