<?php

/**
 * Review Card.
 */

$rating             = $args['rating'] ?? false;
$name               = $args['name'] ?? false;
$description        = $args['description'] ?? false;
$rank               = $args['rank'] ?? false;
$logotype_image     = $args['logotype_image'] ?? false;
$cover_image        = $args['cover_image'] ?? false;
$features           = $args['features'] ?? false;
$pros               = $args['pros'] ?? false;
$cons               = $args['cons'] ?? false;
$link               = $args['link'] ?? false;
$badge              = $args['badge'] ?? false;
$full_description   = $args['full_description'] ?? false;

$open               = is_admin() ? 'open' : '';
?>

<div class="review-card">

    <div class="review-card__image-container <?php echo $logotype_image ? 'review-card-logo-true' : ''; ?>">

        <?php if ( $cover_image ) : ?>

            <img src="<?php echo $cover_image; ?>" width="auto" height="auto" alt="<?php echo $name; ?>" class="review-card__image">

        <?php endif; ?>

    </div>

    <div class="review-card__content">

        <div class="review-card__header">

            <?php if ( $rank ) : ?>

                <div class="review-card__rank"><?php echo $rank; ?></div>

            <?php endif; ?>

            <?php if ( $name ) : ?>

                <p class="review-card__title"><?php echo $name; ?></p>

            <?php else: ?>

                <?php if ( is_admin() ) : ?>

                    <p class="review-card__title">

                        <span class="block-review-card__title--error">

                            <?php _e( 'Please write a name', 'base' ); ?>

                        </span>

                    </p>

                <?php endif; ?>

            <?php endif; ?>

            <?php if ( $rating ) : ?>

                <div class="review-card__stars">

                    <?php get_template_part( 'template-parts/components/star-rating', null, [
                        'rating'    => $rating,
                        'star-size' => 'medium'
                    ] ); ?>

                </div><!-- .review-card__stars -->

            <?php endif; ?>

            <?php if ( $badge ) : ?>

                <div class="review-card__badge review-card__badge--<?php echo $badge['value']; ?>"><?php echo $badge['label']; ?></div>

            <?php endif; ?>

            <?php if ( $description ) : ?>

                <p class="review-card__description"><?php echo $description; ?></p>

            <?php endif; ?>

        </div><!-- .review-card__header -->

        <div class="review-card__button-container">

            <?php if ( $link ) : ?>

                <a href="<?php echo $link['url']; ?>" class="review-card__button button" target="<?php echo $link['target']; ?>"><?php echo  $link['title'];?></a>

            <?php endif; ?>

        </div><!-- .review-card__button-container -->

        <div class="review-card__features">

            <?php if ( $features ) : ?>

                <div class="review-card-features">

                        <?php foreach ( $features as $feature ) : ?>

                            <div class="review-card-features__item">

                                <div class="review-card-features__label"><?php echo $feature['label']; ?></div>

                                <div class="review-card-features__value"><?php echo $feature['value']; ?></div>

                            </div><!-- .review-card-features__item -->

                        <?php endforeach; ?>

                </div><!-- .review-card-features -->

            <?php endif; ?>

            <?php if ( $logotype_image ) : ?>

                <img src="<?php echo $logotype_image; ?>" width="150" height="150" alt="<?php echo $name; ?>" class="review-card__logo">

            <?php endif; ?>

        </div><!-- .review-card__features -->

        <?php if ( $pros || $cons ) : ?>

            <details class="review-card__accordion review-card-accordion" <?php echo $open ; ?>>

                <summary class="review-card-accordion__title">

                    <?php

                        the_svg_icon( 'arrow-circle-blue' );

                        echo __( 'Pros & Cons', 'base' );

                    ?>

                </summary><!-- .review-card-accordion__title -->

                <div class="review-card-accordion__content">

                    <div class="review-card-accordion__lists">

                        <?php if ( $pros ) : ?>

                            <ul class="review-card-list">

                                <?php foreach ( $pros as $text ) : ?>

                                    <li class="review-card-list__item">

                                        <?php

                                            the_svg_icon( 'arrow-circle-green' );

                                            echo $text['value'];

                                         ?>

                                    </li><!-- .review-card-list__item -->

                                <?php endforeach; ?>

                            </ul><!-- .review-card-list -->

                        <?php endif; ?>

                        <?php if ( $cons ) : ?>

                            <ul class="review-card-list">

                                <?php foreach ( $cons as $text ) : ?>

                                    <li class="review-card-list__item">

                                        <?php

                                            the_svg_icon( 'exit-circle-red' );

                                            echo $text['value'];

                                        ?>

                                    </li><!-- .review-card-list__item -->

                                <?php endforeach; ?>

                            </ul><!-- .review-card-list -->

                        <?php endif; ?>

                    </div><!-- .review-card-accordion__lists -->

                </div><!-- .review-card-accordion__content -->

            </details><!-- .review-card-accordion -->

        <?php endif; ?>

        <?php if ( $full_description ) : ?>

            <hr class="review-card__line">

            <details class="review-card__accordion review-card-accordion" <?php echo $open ; ?>>

                <summary class="review-card-accordion__title">

                    <?php

                        the_svg_icon( 'arrow-circle-blue' );

                        echo __( 'View full review', 'base' );

                    ?>

                </summary><!-- .review-card-accordion__title -->

                <div class="review-card-accordion__content">

                    <?php echo $full_description; ?>

                </div><!-- .review-card-accordion__content -->

            </details><!-- .review-card-accordion -->

        <?php endif; ?>

    </div><!-- .review-card__content -->

</div><!-- .review-card -->