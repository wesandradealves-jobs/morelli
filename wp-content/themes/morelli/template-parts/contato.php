<div class="shortcuts">
    <?php if(get_theme_mod('telefone') || get_theme_mod('email') || get_theme_mod('endereco')) : ?>
        <div class="contato">
            <?php if(!wpse_228223_verify_caller_file( 'header.php' )) : ?> <div> <?php endif; ?>
                <?php if(get_theme_mod('endereco') && !wpse_228223_verify_caller_file( 'header.php' )) : ?>
                <h2>Localização</h2>
                <p class="endereco">
                    <?php echo get_theme_mod('endereco'); ?>
                </p>
                <?php endif; ?>
                <?php if(get_theme_mod('telefone')) : ?>
                <p>
                    <?php if(wpse_228223_verify_caller_file( 'header.php' )) : ?>
                        <i>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/phone.png">
                        </i>
                    <?php endif; ?>
                    <?php 
                        if(stripos(get_theme_mod('telefone'), ',')){
                            $telefone = explode(',', get_theme_mod('telefone'));
                           if(wpse_228223_verify_caller_file( 'header.php' )){
                                print $telefone[0];
                            } else {
                                print '<br><span>'.implode('</span><span>', $telefone).'</span>';
                            }
                        } else {
                            $telefone = get_theme_mod('telefone');
                            print $telefone;
                        }
                    ?> 
                </p>
                <?php endif; ?>
                <?php if(get_theme_mod('email')) : ?>
                <p>
                   <?php echo '<a href="mailto:'.get_theme_mod('email').'" title="'.get_theme_mod('email').'">'.get_theme_mod('email').'</a>'; ?> 
                </p>
                <?php endif; ?>
            <?php if(!wpse_228223_verify_caller_file( 'header.php' )) : ?> </div> <?php endif; ?>
            <?php if(!wpse_228223_verify_caller_file( 'header.php' )) : ?>
                <div>
                    <h2>
                        <span>Áreas de</span>
                        <span>Atuação</span>
                    </h2>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if(wpse_228223_verify_caller_file( 'header.php' )) : ?>
        <div class="language">
            <nav>
                <ul>
                    <li class="active">
                        <a href="#">Português</a>
                    </li>
                    <li>
                        <a href="#">Inglês</a>
                    </li>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
</div>

