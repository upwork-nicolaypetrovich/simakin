                            <div class="blog-wrap">
                                <article class="content-block without-footer">
                                    <h2 class="h2">Сертификаты</h2>

                                    <div class="owl-carousel certificates zoom-gallery">
                                    
                                        <?php foreach ( $images as $image ) : ?>
                                            <div class="certificate">
                                                <a href="<?php echo $image->imageURL; ?>"><img src="<?php echo $image->thumbnailURL; ?>" alt=""></a>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>

                                </article>
                            </div>