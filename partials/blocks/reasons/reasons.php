<?php

/**
 * Number of Reasons Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'reasons-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$textalign ='';
if( !empty($block['align_text']) ) {
    $textalign .= $block['align_text'];
}

// Load values and assing defaults.
$title = get_field('reasons-title');
$subtitle_number = get_field('reasons-number');
$subtitle_what = get_field('reasons-what');
$reasons_subtitle_box = get_field('reasons_subtitle_box');

$count = count(get_field('reasons-blocks'));

?>

<div class="reasons <?php echo $className ?>">
    <!-- Reasons title -->
    <?php if($title): ?>
    <h2 class="reasons__title <?php echo $textalign ?>"><?php echo $title ?></h2>
    <?php endif; ?>
    <!-- Reasons subtitle (outside bosex) -->
    <?php if($subtitle && $reasons_subtitle_box == 'nobox'): ?>
    <h2 class="reasons__subtitle"><?php echo $subtitle_number ?><?php echo $subtitle_what ?></h2>
    <?php endif; ?>

        <?php if( have_rows('reasons-blocks') ): ?>
            <div class="reasons__blocks reasons__blocks-<?php echo $count ?>">
                
                <!-- Reason subtitle as a box -->
                <?php if( $reasons_subtitle_box == 'box') { ?>
                <div class="reason reasons__subtitle-box">
                    <h3 class="reason__subtitle <?php echo $textalign ?>"><span><?php echo $subtitle_number ?></span><?php echo $subtitle_what ?></h3>
                </div>
                <?php }

                // Reasons loop.
                while( have_rows('reasons-blocks') ) : the_row();

                    // Load sub field value.
                    $reason = get_sub_field('reason-text');
                    $icon = get_sub_field('reason-icon'); 
                    // if( $icon ):

                    //     // Image variables.
                    //     // $url = $icon['url'];
                    //     // $title = $icon['title'];
                    //     // $alt = $icon['alt'];

                    //     // Thumbnail size attributes.
                    //     $size = 'full';
                    //     $thumb = $image['sizes'][ $size ];
                    // endif; 
                    ?>

                    <!-- Single reason box -->
                    <div class="reason">
                        <img class="reason__icon" src="<?php echo esc_url($icon['url']); ?>">
                        <p class="reason__text <?php echo $textalign ?>"><?php echo $reason ?></p>
                    </div>
                
                <?php endwhile; ?>

            </div><!-- .reasons__blocks -->
        <?php endif; ?>

</div><!-- .reasons -->