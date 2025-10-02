<?php
/**
 * CN Review Card.
 */

$id = 'block-review-card-' . $block['id'];

?>

<div id="<?php echo $id;?>" class="block-review-card">

    <?php

        get_template_part( 'template-parts/components/review-card', null, [
            'rating'            => get_field('review_card_star_rating'),
            'name'              => get_field('review_card_name'),
            'description'       => get_field('review_card_description'),
            'rank'              => get_field('review_card_rank'),
            'logotype_image'    => get_field('review_card_logotype'),
            'cover_image'       => get_field('review_card_cover_image'),
            'features'          => get_field('review_card_features'),
            'pros'              => get_field('review_card_pros'),
            'cons'              => get_field('review_card_cons'),
            'link'              => get_field('review_card_link'),
            'badge'             => get_field('review_card_badge'),
            'full_description'  => get_field('review_card_full_description'),
        ] );

    ?>

</div><!-- .block-review-card -->
