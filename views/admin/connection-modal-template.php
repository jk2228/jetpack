<script id="tmpl-connection-modal" type="text/html">
	<span id="modal-label" class="screen-reader-text"><?php _e( 'Modal window. Press escape to close.', 'jetpack' ); ?></span>
	<a href="#" class="close">&times; <span class="screen-reader-text"><?php _e( 'Close modal window', 'jetpack' ); ?></span></a>
	<div class="content-container <# if ( data.available) { #>modal-footer<# } #>">
		<div id="my-connection-content" class="content">
			<# if ( data.isAdmin ) { #><?php /* if user has admin privledges */ ?>
				<h3>Primary Jetpack Connection</h3>
				<div class="connection-details">
					<div class="j-row">
						<div class="j-col j-lrg-6 j-md-6 j-sm-12 jp-user">
							<h3 title="<?php _e( 'Username', 'jetpack' ); ?>"><?php _e( 'Site Username', 'jetpack' ); ?></h3>
							<div class="user-01"><span>{{{ data.connectionLogic.masterUserLink }}} <# if ( data.connectionLogic.isMasterUser ) { #>(you) <# } #></span></div>
						</div><!-- // jp-user -->
						<div class="j-col j-lrg-6 j-md-6 j-sm-12 wp-user">
							<h3 title="<?php _e( 'WordPress.com Username', 'jetpack' ); ?>"><?php _e( 'WordPress.com Username', 'jetpack' ); ?></h3>
							<div class="wpuser-02"><span>{{{ data.masterComData.login }}}</span></div>
						</div><!-- // wp-user -->
					</div><!-- // j-row -->
					<div class="j-row">
						<div class="j-col j-lrg-12 j-md-12 j-sm-12 jp-actions">
							<a class="button" href="<?php echo wp_nonce_url( Jetpack::admin_url( 'action=disconnect' ), 'jetpack-disconnect' ); ?>" onclick="return confirm('<?php echo htmlspecialchars( __( 'Are you sure you want to disconnect from WordPress.com?', 'jetpack' ), ENT_QUOTES ); ?>');"><?php esc_html_e( 'Disconnect Site', 'jetpack' ); ?></a>
						</div>
					</div><!-- // j-row -->
				</div>
				<# if ( !data.connectionLogic.isMasterUser ) { #>
					<h3>Your Jetpack Connection</h3>
					<# if ( data.connectionLogic.isUserConnected ) { #><?php /* user is connected to Jetpack */ ?>
						<div class="connection-details">
							<div class="j-row">
								<div class="j-col j-lrg-6 j-md-6 j-sm-12 jp-user">
									<h3 title="<?php _e( 'Site Username', 'jetpack' ); ?>"><?php _e( 'Site Username', 'jetpack' ); ?></h3>
									<div class="user-01"><span>{{{ data.connectionLogic.adminUsername }}} (you)</span></div>
								</div><!-- // jp-user -->
								<div class="j-col j-lrg-6 j-md-6 j-sm-12 wp-user">
									<h3 title="<?php _e( 'WordPress.com Username', 'jetpack' ); ?>"><?php _e( 'WordPress.com Username', 'jetpack' ); ?></h3>
									<div class="wpuser-02"><span>{{{ data.userComData.login }}}</span></div>
								</div><!-- // wp-user -->
							</div><!-- // j-row -->
							<div class="j-row">
								<div class="j-col j-lrg-12 j-md-12 j-sm-12 jp-actions">
									<a class="button" id="set-self-as-master"><?php esc_html_e( 'Make Primary', 'jetpack' ); ?></a>
									<a class="button" title="Disconnect your WordPress.com account from Jetpack" href="<?php echo wp_nonce_url( Jetpack::admin_url( 'action=unlink' ), 'jetpack-unlink' ); ?>"><?php esc_html_e( 'Unlink my account ', 'jetpack' ); ?></a>
								</div>
							</div><!-- // j-row -->
						</div><!-- // connection-details -->
					<# } else { #><?php /* user isn't connected to Jetpack at all and should see a connection prompt */ ?>
						<div class="connection-details">
							<div class="j-row">
								<div class="j-col j-lrg-6 j-md-6 j-sm-12 jp-user">
									<h3 title="<?php _e( 'Site Username', 'jetpack' ); ?>"><?php _e( 'Site Username', 'jetpack' ); ?></h3>
									<div class="user-01"><span>{{{ data.connectionLogic.adminUsername }}} (you)</span></div>
								</div><!-- // jp-user -->
								<div class="j-col j-lrg-6 j-md-6 j-sm-12 wp-user">
									<h3 title="<?php _e( 'WordPress.com Username', 'jetpack' ); ?>"><?php _e( 'WordPress.com Username', 'jetpack' ); ?></h3>
									<div class="wpuser-02"><a class="button" href="<?php echo Jetpack::init()->build_connect_url() ?>" class="button"><?php esc_html_e( 'Link your account to WordPress.com', 'jetpack' ); ?></a></div>
								</div><!-- // wp-user -->
							</div><!-- // j-row -->
						</div><!-- // connection-details -->
					<# } #>
				<# } #>
			<# } else { #><?php /* User doesn't have admin privledges */ ?>
				<h3>Your Jetpack Connection</h3>
				<# if ( data.connectionLogic.isUserConnected ) { #><?php /* user is connected to Jetpack */ ?>
					<div class="connection-details">
						<div class="j-row">
							<div class="j-col j-lrg-6 j-md-6 j-sm-12 jp-user">
								<h3 title="<?php _e( 'Site Username', 'jetpack' ); ?>"><?php _e( 'Site Username', 'jetpack' ); ?></h3>
								<div class="user-01"><span>{{{ data.connectionLogic.adminUsername }}} (you)</span></div>
							</div><!-- // jp-user -->
							<div class="j-col j-lrg-6 j-md-6 j-sm-12 wp-user">
								<h3 title="<?php _e( 'WordPress.com Username', 'jetpack' ); ?>"><?php _e( 'WordPress.com Username', 'jetpack' ); ?></h3>
								<div class="wpuser-02">{{{ data.userComData.login }}}</div>
							</div><!-- // wp-user -->
						</div><!-- // j-row -->
						<div class="j-row">
							<div class="j-col j-lrg-12 j-md-12 j-sm-12 jp-actions">
								<a class="button" title="Disconnect your WordPress.com account from Jetpack" href="<?php echo wp_nonce_url( Jetpack::admin_url( 'action=unlink' ), 'jetpack-unlink' ); ?>"><?php esc_html_e( 'Unlink my account ', 'jetpack' ); ?></a>
							</div>
						</div><!-- // j-row -->
					</div><!-- // connection-details -->
					<# } else { #><?php /* user isn't connected to Jetpack at all and should see a connection prompt */ ?>
						<div class="connection-details">
							<div class="j-row">
								<div class="j-col j-lrg-6 j-md-6 j-sm-12 jp-user">
									<h3 title="<?php _e( 'Site Username', 'jetpack' ); ?>"><?php _e( 'Site Username', 'jetpack' ); ?></h3>
									<div class="user-01"><span>{{{ data.connectionLogic.adminUsername }}} (you)</span></div>
								</div><!-- // jp-user -->
								<div class="j-col j-lrg-6 j-md-6 j-sm-12 wp-user">
									<h3 title="<?php _e( 'WordPress.com Username', 'jetpack' ); ?>"><?php _e( 'WordPress.com Username', 'jetpack' ); ?></h3>
									<div class="wpuser-02"><a class="button" href="<?php echo Jetpack::init()->build_connect_url() ?>" class="button"><?php esc_html_e( 'Link your account to WordPress.com', 'jetpack' ); ?></a></div>
								</div><!-- // wp-user -->
							</div><!-- // j-row -->
						</div><!-- // connection-details -->
						<# } #><?php /* end data.connectionLogic.isUserConnected */ ?>
			<# } #><?php /* end data.isAdmin */ ?>
		</div>
	</div>
</script>

<script id="tmpl-connection-modal-loading" type="text/html">
<p>Loading...</p>
</script>
