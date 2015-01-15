<?php
/**
 * Search form template
 *
 * @package Radius
 * @since 1.0
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <input type="text" onfocus="if (this.value == '<?php _e( 'Search the site', 'radius' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Search the site', 'radius' ); ?>';}" value="<?php _e( 'Search the site', 'radius' ); ?>" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="<?php _e( 'Search', 'radius' ); ?>" />
    </div>
</form>
