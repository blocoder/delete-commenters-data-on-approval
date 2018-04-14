<?php
/**
 * ACHTUNG: Funktioniert nur, wenn die Kommentare manuell im WordPress-Backend freigegeben werden.
 * Installation, Möglichkeit a): 
 * Dieses Script einfach in die functions.php des aktiven Themes kopieren.
 * Installation, Möglichkeit b): 
 * Diese Datei als "Must Use"-Plugin in den Ordner "\wp-content\mu-plugins" kopieren. 
 * Der Ordner "mu-plugins" muss ggf. erst erstellt werden.
 */

if ( !function_exists('pcl_action_wp_set_comment_status') ) :

/**
 * Entfernt die IP-Adresse und die Browser-Kennung des Kommentar-Eintrags aus der Datenbank,
 * wenn der Kommentar genehmigt wird.
 * Action-Hook: wp_set_comment_status
 */
function pcl_action_wp_set_comment_status( $comment_id, $comment_status ) {
    /* Der neue Kommentar-Status muss 'approve' sein */
    if ( $comment_status == 'approve' ) {
        /* Alle Kommentar-Felder mit der comment_id ermitteln */
        $comment = get_comment( $comment_id, ARRAY_A );
        if ( !empty( $comment ) ) {
            /* IP-Adresse überschreiben */
            $comment['comment_author_IP'] = '127.0.0.1';
            /* Browser-Kennung entfernen */
            $comment['comment_agent'] = '';
            /* E-Mail-Adresse entfernen, 
             * wenn es kein angemeldeter WordPress-Benutzer ist */
            if ( 0 === (int)$comment['user_id'] ) {
                $comment['comment_author_email'] = '';
            }
            /* Alle Kommentar-Felder in der Datenbank speichern / aktualisieren */
            wp_update_comment( $comment );
        }
    }
}
add_action( 'wp_set_comment_status', 'pcl_action_wp_set_comment_status', 10, 2 );

endif; // !function_exists
