<div class="shortcuts">
    <?php if(get_theme_mod('telefone') || get_theme_mod('email')) : ?>
        <div class="contato">
            <?php if(did_action('get_footer')) : ?> <div> <?php endif; ?>
                <?php if(get_theme_mod('telefone')) : ?>
                <p>
                    <?php if(get_theme_mod('endereco') && did_action('get_footer')) : ?>
                    <h2>Localização</h2>
                    <p class="endereco">
                        <?php echo get_theme_mod('endereco'); ?>
                    </p>
                    <?php endif; ?>
                    <?php if(!did_action('get_footer')) : ?>
                        <i>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/phone.png">
                        </i>
                    <?php endif; ?>
                    <?php 
                        if(stripos(get_theme_mod('telefone'), ',')){
                            $telefone = explode(',', get_theme_mod('telefone'));
                           if(!did_action('get_footer')){
                                print $telefone[0];
                            } else {
                                print '<span>'.implode('</span><span>', $telefone).'</span>';
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
            <?php if(did_action('get_footer')) : ?> </div> <?php endif; ?>
            <?php if(did_action('get_footer')) : ?>
                <div>
                    <h2 class="quem-somos-title">
                        <span>Quem</span>
                        <span>Somos</span>
                    </h2>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if(!did_action('get_footer')) : ?>
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

