<?php
die("ssa");
$user = wp_get_current_user();

//if ( in_array( 'shop_manager', (array) $user->roles ) ) {
    //The user has the "author" role
    function remove_menus(){

        remove_menu_page( 'index.php' ); //Dashboard 
        remove_menu_page( 'edit.php' ); //Posts - publicações
        remove_menu_page( 'upload.php' ); //Media - imagens, vídeos, docs, etc...
        remove_menu_page( 'edit.php?post_type=page' ); //Pages - páginas
        remove_menu_page( 'edit-comments.php' ); //Comments - comentários
        remove_menu_page( 'themes.php' ); //Appearance - aparência (recomendo!)
        remove_menu_page( 'plugins.php' ); //Plugins (recomendo!)
        remove_menu_page( 'users.php' ); //Users - usuários 
        remove_menu_page( 'tools.php' ); //Tools - ferramentas (recomendo!)
        remove_menu_page( 'options-general.php' ); //Settings - configurações 
        remove_menu_page( 'admin.php?page=revslider' ); //revolution slider, se estiver instalado
        
        }
    add_action( 'admin_menu', 'remove_menus' );
    
//}
?>