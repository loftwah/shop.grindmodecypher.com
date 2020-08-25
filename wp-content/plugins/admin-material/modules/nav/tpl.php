	<h3 class="m-b"><span>Bar</span></h3>
	<p class="no-m-t text-sm">Change the admin bar on the top</p>
	<div class="box">
		<h4><span>Logo &amp; name</span></h4>
		<div class="box-body b-t hide">
			<p>
				<label>
					logo image<br>
					<input name="<?php echo $this->setting->setting_name; ?>[bar_logo]" type="text" value="<?php esc_html_e( $this->setting->get_setting('bar_logo') ); ?>">
					<button type="button" class="button-secondary upload-btn">Upload</button>
				</label>
			</p>
			<p>
				<label>
					Link
					<input name="<?php echo $this->setting->setting_name; ?>[bar_name_link]" type="text" value="<?php esc_html_e( $this->setting->get_setting('bar_name_link') ); ?>" class="widefat">
				</label>
			</p>
			<p>
				<label>
					Name
					<input name="<?php echo $this->setting->setting_name; ?>[bar_name]" type="text" value="<?php esc_html_e( $this->setting->get_setting('bar_name') ); ?>" class="widefat">
				</label>
			</p>
			<p>
				<label>
					<input name="<?php echo $this->setting->setting_name; ?>[bar_name_hide]" type="checkbox" <?php if ( $this->setting->get_setting('bar_name_hide') == true ) echo 'checked="checked" '; ?>> 
					Hide 'Name'
				</label>
			</p>
		</div>
	</div>
	<div class="box">
		<h4><span>Quick links</span></h4>
		<div class="box-body b-t hide">
			<p>
				<fieldset>
					<label>
						<input name="<?php echo $this->setting->setting_name; ?>[bar_updates_hide]" type="checkbox" <?php if ($this->setting->get_setting('bar_updates_hide') == true) echo 'checked="checked" '; ?>> 
						Remove 'Updates'
					</label>
					<br>
					<label>
						<input name="<?php echo $this->setting->setting_name; ?>[bar_comments_hide]" type="checkbox" <?php if ($this->setting->get_setting('bar_comments_hide') == true) echo 'checked="checked" '; ?>> 
						Remove 'Comments'
					</label>
					<br>
					<label>
						<input name="<?php echo $this->setting->setting_name; ?>[bar_new_hide]" type="checkbox" <?php if ($this->setting->get_setting('bar_new_hide') == true) echo 'checked="checked" '; ?>> 
						Remove 'New'
					</label>
					<?php if ( is_multisite() && get_current_blog_id() == 1 && current_user_can( 'manage_options' ) ) { ?>
					<br>
					<label>
						<input name="<?php echo $this->setting->setting_name; ?>[bar_site_hide]" type="checkbox" <?php if ($this->setting->get_setting('bar_site_hide') == true) echo 'checked="checked" '; ?>> 
						Remove 'My sites'
					</label>
					<?php } ?>
				</fieldset>
			</p>
		</div>
	</div>
	<h3 class="m-b"><span>Menu</span></h3>
	<p class="no-m-t  text-sm">Change the menu on the left.</p>
	<p class="text-sm">
		<label style="margin-right:10px">
			<input name="<?php echo $this->setting->setting_name; ?>[menu_collapse]" type="checkbox" <?php if ($this->setting->get_setting('menu_collapse') == true) echo 'checked="checked" '; ?>> 
			Collapse 
		</label>
		<label style="margin-right:10px">
			<input name="<?php echo $this->setting->setting_name; ?>[menu_collapse_hide]" type="checkbox" <?php if ($this->setting->get_setting('menu_collapse_hide') == true) echo 'checked="checked" '; ?>> 
			Hide collapse link
		</label>
		<label>
			<input name="<?php echo $this->setting->setting_name; ?>[menu_h]" type="checkbox" <?php if ($this->setting->get_setting('menu_h') == true) echo 'checked="checked" '; ?>> 
			Horizontal
		</label>
	</p>
	<div class="clearfix admin-menus">
			<?php
				foreach ($this->menus as $k=>$v){
					$id = $this->get_slug($v);
					if($id[0] != NULL){
						$title = isset( $this->nav[$id[0]]['title'] ) && $this->nav[$id[0]]['title'] != '' ? $this->nav[$id[0]]['title'] : NULL;
						$icon  = isset( $this->nav[$id[0]]['icon'] ) && $this->nav[$id[0]]['icon'] != '' ? $this->nav[$id[0]]['icon'] : NULL;
						$hide  = isset( $this->nav[$id[0]]['hide'] ) && $this->nav[$id[0]]['hide'] != '' ? $this->nav[$id[0]]['hide'] : NULL;
						$index = isset( $this->nav[$id[0]]['index'] ) && $this->nav[$id[0]]['index'] != '' ? $this->nav[$id[0]]['index'] : $v[10];
			?>
			<div class="box bg admin-menu-item">

				<h4 <?php if($id[1] == NULL){ echo 'class="separator"'; }?> >
					<?php if($id[1]){ ?>
					<i id="<?php echo 'icon-'.$k; ?>" class="<?php echo esc_attr( $icon ? $icon : $v[6] ); ?>" data-target="#dropdown" data-toggle="dropdown"></i>
					<input name="<?php echo $this->setting->setting_name.'[menu]['.$id[0].'][icon]'; ?>" value="<?php echo esc_attr( $icon ); ?>" type="text" hidden>
					<span class="pull-right text-muted <?php if ( $hide ) echo 'text-l-t'; ?>">
						<?php if($title) echo $id[1]; ?>
					</span>
					<span class="at-menu-title"><?php echo $title ? $title : $id[1]; ?></span>
					<?php } ?>
				</h4>

				<div class="box-body b-t hide">
					<input name="<?php echo $this->setting->setting_name.'[menu]['.$id[0].'][index]'; ?>" value="<?php esc_html_e( $index ); ?>" type="text" hidden>
					<?php if($id[1]){ ?>
					<p>
						<label>
							Title:
							<input name="<?php echo $this->setting->setting_name.'[menu]['.$id[0].'][title]'; ?>" value="<?php esc_html_e( $title ); ?>" type="text" class="widefat">
						</label>
					</p>
					<?php } ?>
					<p>
						<label>
							<input name="<?php echo $this->setting->setting_name.'[menu]['.$id[0].'][hide]'; ?>" <?php if ($hide) echo 'checked="checked" '; ?> type="checkbox"> 
							Remove from menu
						</label>
					</p>
					<?php
						if(isset($this->submenus[$v[2]])){
					?>
					<p class="toggle">
						<a href="#admin" class="c-p">Submenu</a>										
					</p>
					<?php } ?>
					<div class="hide admin-menus">
						<?php
							$sub = isset($this->submenus[$v[2]]) ? $this->submenus[$v[2]] : array() ;
							
							foreach ($sub as $k=>$v){
								$sid = $this->get_slug($v);

								if($sid[0] != NULL){
									$title = isset( $this->subnav[$sid[0]]['title'] ) && $this->subnav[$sid[0]]['title'] != '' ? $this->subnav[$sid[0]]['title'] : NULL;
									$hide  = isset( $this->subnav[$sid[0]]['hide'] )  && $this->subnav[$sid[0]]['hide'] != '' ? TRUE : FALSE;
									$index = isset( $this->subnav[$sid[0]]['index'] ) && $this->subnav[$sid[0]]['index'] != '' ? $this->subnav[$sid[0]]['index'] : $v[10];
						?>
						<div class="box admin-menu-item">
							<h4 class="sm">
								<span class="pull-right text-muted <?php if ( $hide ) echo 'text-l-t'; ?>">
									<?php if($title) echo $sid[1]; ?>
								</span>
								<span><?php echo $title ? $title : $sid[1]; ?></span>
							</h4>
							<div class="box-body b-t hide">
								<input name="<?php echo $this->setting->setting_name.'[submenu]['.$sid[0].'][index]'; ?>" value="<?php esc_html_e( $index ); ?>" type="text" hidden>
								<p>
									<label>
										Title:
										<input name="<?php echo $this->setting->setting_name.'[submenu]['.$sid[0].'][title]'; ?>" value="<?php esc_html_e( $title ); ?>" type="text" class="widefat">
									</label>
								</p>
								<p>
									<label>
										<input name="<?php echo $this->setting->setting_name.'[submenu]['.$sid[0].'][hide]'; ?>" <?php if ( $hide ) echo 'checked="checked" '; ?> type="checkbox"> 
										Remove from menu
									</label>
								</p>
							</div>
						</div>
						<?php } }?>
					</div>
				</div>
			</div>
			<?php
				}
			} ?>
			<div id="dropdown" class="dropdown box">
				<div class="box-body" id="tab-iconlist">
					<div class="clearfix">
						<ul class="subsubsub">
							<li><a href="#tab-dashicons" class="current">Dashicons <span class="count">(230)</span></a> | </li>
							<li><a href="#tab-icons">Icons <span class="count">(739)</span></a></li>
						</ul>
					</div>
					<div class="iconlist clearfix" id="tab-dashicons">
						<!-- admin menu -->
						<div title="menu" class="dashicons-menu"></div>
						<div title="site" class="dashicons-admin-site"></div>
						<div title="dashboard" class="dashicons-dashboard"></div>
						<div title="post" class="dashicons-admin-post"></div>
						<div title="media" class="dashicons-admin-media"></div>
						<div title="links" class="dashicons-admin-links"></div>
						<div title="page" class="dashicons-admin-page"></div>
						<div title="comments" class="dashicons-admin-comments"></div>
						<div title="appearance" class="dashicons-admin-appearance"></div>
						<div title="plugins" class="dashicons-admin-plugins"></div>
						<div title="users" class="dashicons-admin-users"></div>
						<div title="tools" class="dashicons-admin-tools"></div>
						<div title="settings" class="dashicons-admin-settings"></div>
						<div title="network" class="dashicons-admin-network"></div>
						<div title="home" class="dashicons-admin-home"></div>
						<div title="generic" class="dashicons-admin-generic"></div>
						<div title="collapse" class="dashicons-admin-collapse"></div>
						<div title="filter" class="dashicons-filter"></div>
						<div title="customizer" class="dashicons-admin-customizer"></div>
						<div title="multisite" class="dashicons-admin-multisite"></div>
						<!-- welcome screen -->
						<div title="write blog" class="dashicons-welcome-write-blog"></div>
						<!--<div title="" class="dashicons-welcome-edit-page"></div> Duplicate -->
						<div title="add page" class="dashicons-welcome-add-page"></div>
						<div title="view site" class="dashicons-welcome-view-site"></div>
						<div title="widgets and menus" class="dashicons-welcome-widgets-menus"></div>
						<div title="comments" class="dashicons-welcome-comments"></div>
						<div title="learn more" class="dashicons-welcome-learn-more"></div>

						<!-- post formats -->
						<!--<div title="" class="dashicons-format-standard"></div> Duplicate -->
						<div title="aside" class="dashicons-format-aside"></div>
						<div title="image" class="dashicons-format-image"></div>
						<div title="gallery" class="dashicons-format-gallery"></div>
						<div title="video" class="dashicons-format-video"></div>
						<div title="status" class="dashicons-format-status"></div>
						<div title="quote" class="dashicons-format-quote"></div>
						<!--<div title="links" class="dashicons-format-links"></div> Duplicate -->
						<div title="chat" class="dashicons-format-chat"></div>
						<div title="audio" class="dashicons-format-audio"></div>
						<div title="camera" class="dashicons-camera"></div>
						<div title="images (alt)" class="dashicons-images-alt"></div>
						<div title="images (alt 2)" class="dashicons-images-alt2"></div>
						<div title="video (alt)" class="dashicons-video-alt"></div>
						<div title="video (alt 2)" class="dashicons-video-alt2"></div>
						<div title="video (alt 3)" class="dashicons-video-alt3"></div>

						<!-- media -->
						<div title="archive" class="dashicons-media-archive"></div>
						<div title="audio" class="dashicons-media-audio"></div>
						<div title="code" class="dashicons-media-code"></div>
						<div title="default" class="dashicons-media-default"></div>
						<div title="document" class="dashicons-media-document"></div>
						<div title="interactive" class="dashicons-media-interactive"></div>
						<div title="spreadsheet" class="dashicons-media-spreadsheet"></div>
						<div title="text" class="dashicons-media-text"></div>
						<div title="video" class="dashicons-media-video"></div>
						<div title="audio playlist" class="dashicons-playlist-audio"></div>
						<div title="video playlist" class="dashicons-playlist-video"></div>
						<div title="play player" class="dashicons-controls-play"></div>
						<div title="player pause" class="dashicons-controls-pause"></div>
						<div title="player forward" class="dashicons-controls-forward"></div>
						<div title="player skip forward" class="dashicons-controls-skipforward"></div>
						<div title="player back" class="dashicons-controls-back"></div>
						<div title="player skip back" class="dashicons-controls-skipback"></div>
						<div title="player repeat" class="dashicons-controls-repeat"></div>
						<div title="player volume on" class="dashicons-controls-volumeon"></div>
						<div title="player volume off" class="dashicons-controls-volumeoff"></div>

						<!-- image editing -->
						<div title="crop" class="dashicons-image-crop"></div>
						<div title="rotate" class="dashicons-image-rotate"></div>
						<div title="rotate left" class="dashicons-image-rotate-left"></div>
						<div title="rotate right" class="dashicons-image-rotate-right"></div>
						<div title="flip vertical" class="dashicons-image-flip-vertical"></div>
						<div title="flip horizontal" class="dashicons-image-flip-horizontal"></div>
						<div title="filter" class="dashicons-image-filter"></div>
						<div title="undo" class="dashicons-undo"></div>
						<div title="redo" class="dashicons-redo"></div>

						<!-- tinymce -->
						<div title="bold" class="dashicons-editor-bold"></div>
						<div title="italic" class="dashicons-editor-italic"></div>
						<div title="ul" class="dashicons-editor-ul"></div>
						<div title="ol" class="dashicons-editor-ol"></div>
						<div title="quote" class="dashicons-editor-quote"></div>
						<div title="alignleft" class="dashicons-editor-alignleft"></div>
						<div title="aligncenter" class="dashicons-editor-aligncenter"></div>
						<div title="alignright" class="dashicons-editor-alignright"></div>
						<div title="insertmore" class="dashicons-editor-insertmore"></div>
						<div title="spellcheck" class="dashicons-editor-spellcheck"></div>
						<!-- <div title="" class="dashicons-editor-distractionfree"></div> Duplicate -->
						<div title="expand" class="dashicons-editor-expand"></div>
						<div title="contract" class="dashicons-editor-contract"></div>
						<div title="kitchen sink" class="dashicons-editor-kitchensink"></div>
						<div title="underline" class="dashicons-editor-underline"></div>
						<div title="justify" class="dashicons-editor-justify"></div>
						<div title="textcolor" class="dashicons-editor-textcolor"></div>
						<div title="paste" class="dashicons-editor-paste-word"></div>
						<div title="paste" class="dashicons-editor-paste-text"></div>
						<div title="remove formatting" class="dashicons-editor-removeformatting"></div>
						<div title="video" class="dashicons-editor-video"></div>
						<div title="custom character" class="dashicons-editor-customchar"></div>
						<div title="outdent" class="dashicons-editor-outdent"></div>
						<div title="indent" class="dashicons-editor-indent"></div>
						<div title="help" class="dashicons-editor-help"></div>
						<div title="strikethrough" class="dashicons-editor-strikethrough"></div>
						<div title="unlink" class="dashicons-editor-unlink"></div>
						<div title="rtl" class="dashicons-editor-rtl"></div>
						<div title="break" class="dashicons-editor-break"></div>
						<div title="code" class="dashicons-editor-code"></div>
						<div title="paragraph" class="dashicons-editor-paragraph"></div>
						<div title="table" class="dashicons-editor-table"></div>
						<!-- posts -->
						<div title="align left" class="dashicons-align-left"></div>
						<div title="align right" class="dashicons-align-right"></div>
						<div title="align center" class="dashicons-align-center"></div>
						<div title="align none" class="dashicons-align-none"></div>
						<div title="lock" class="dashicons-lock"></div>
						<div title="unlock" class="dashicons-unlock"></div>
						<div title="calendar" class="dashicons-calendar"></div>
						<div title="calendar" class="dashicons-calendar-alt"></div>
						<div title="visibility" class="dashicons-visibility"></div>
						<div title="hidden" class="dashicons-hidden"></div>
						<div title="post status" class="dashicons-post-status"></div>
						<div title="edit pencil" class="dashicons-edit"></div>
						<div title="trash remove delete" class="dashicons-trash"></div>
						<div title="sticky" class="dashicons-sticky"></div>
						<!-- sorting -->
						<div title="external" class="dashicons-external"></div>
						<div title="arrow-up" class="dashicons-arrow-up"></div>
						<div title="arrow-down" class="dashicons-arrow-down"></div>
						<div title="arrow-right" class="dashicons-arrow-right"></div>
						<div title="arrow-left" class="dashicons-arrow-left"></div>
						<div title="arrow-up" class="dashicons-arrow-up-alt"></div>
						<div title="arrow-down" class="dashicons-arrow-down-alt"></div>
						<div title="arrow-right" class="dashicons-arrow-right-alt"></div>
						<div title="arrow-left" class="dashicons-arrow-left-alt"></div>
						<div title="arrow-up" class="dashicons-arrow-up-alt2"></div>
						<div title="arrow-down" class="dashicons-arrow-down-alt2"></div>
						<div title="arrow-right" class="dashicons-arrow-right-alt2"></div>
						<div title="arrow-left" class="dashicons-arrow-left-alt2"></div>
						<div title="sort" class="dashicons-sort"></div>
						<div title="left right" class="dashicons-leftright"></div>
						<div title="randomize shuffle" class="dashicons-randomize"></div>
						<div title="list view" class="dashicons-list-view"></div>
						<div title="exerpt view" class="dashicons-exerpt-view"></div>
						<div title="grid view" class="dashicons-grid-view"></div>

						<!-- social -->
						<div title="share" class="dashicons-share"></div>
						<div title="share" class="dashicons-share-alt"></div>
						<div title="share" class="dashicons-share-alt2"></div>
						<div title="twitter social" class="dashicons-twitter"></div>
						<div title="rss" class="dashicons-rss"></div>
						<div title="email" class="dashicons-email"></div>
						<div title="email" class="dashicons-email-alt"></div>
						<div title="facebook social" class="dashicons-facebook"></div>
						<div title="facebook social" class="dashicons-facebook-alt"></div>
						<div title="googleplus social" class="dashicons-googleplus"></div>
						<div title="networking social" class="dashicons-networking"></div>

						<!-- WPorg specific icons: Jobs, Profiles, WordCamps -->
						<div title="hammer development" class="dashicons-hammer"></div>
						<div title="art design" class="dashicons-art"></div>
						<div title="migrate migration" class="dashicons-migrate"></div>
						<div title="performance" class="dashicons-performance"></div>
						<div title="universal access accessibility" class="dashicons-universal-access"></div>
						<div title="universal access accessibility" class="dashicons-universal-access-alt"></div>
						<div title="tickets" class="dashicons-tickets"></div>
						<div title="nametag" class="dashicons-nametag"></div>
						<div title="clipboard" class="dashicons-clipboard"></div>
						<div title="heart" class="dashicons-heart"></div>
						<div title="megaphone" class="dashicons-megaphone"></div>
						<div title="schedule" class="dashicons-schedule"></div>

						<!-- internal/products -->
						<div title="wordpress" class="dashicons-wordpress"></div>
						<div title="wordpress" class="dashicons-wordpress-alt"></div>
						<div title="press this" class="dashicons-pressthis"></div>
						<div title="update" class="dashicons-update"></div>
						<div title="screenoptions" class="dashicons-screenoptions"></div>
						<div title="info" class="dashicons-info"></div>
						<div title="cart shopping" class="dashicons-cart"></div>
						<div title="feedback form" class="dashicons-feedback"></div>
						<div title="cloud" class="dashicons-cloud"></div>
						<div title="translation language" class="dashicons-translation"></div>

						<!-- taxonomies -->
						<div title="tag" class="dashicons-tag"></div>
						<div title="category" class="dashicons-category"></div>

						<!-- widgets -->
						<div title="archive" class="dashicons-archive"></div>
						<div title="tagcloud" class="dashicons-tagcloud"></div>
						<div title="text" class="dashicons-text"></div>

						<!-- alerts/notifications/flags -->
						<div title="yes check checkmark" class="dashicons-yes"></div>
						<div title="no x" class="dashicons-no"></div>
						<div title="no x" class="dashicons-no-alt"></div>
						<div title="plus add increase" class="dashicons-plus"></div>
						<div title="plus add increase" class="dashicons-plus-alt"></div>
						<div title="minus decrease" class="dashicons-minus"></div>
						<div title="dismiss" class="dashicons-dismiss"></div>
						<div title="marker" class="dashicons-marker"></div>
						<div title="filled star" class="dashicons-star-filled"></div>
						<div title="half star" class="dashicons-star-half"></div>
						<div title="empty star" class="dashicons-star-empty"></div>
						<div title="flag" class="dashicons-flag"></div>
						<div title="warning" class="dashicons-warning"></div>

						<!-- misc/cpt -->
						<div title="location pin" class="dashicons-location"></div>
						<div title="location" class="dashicons-location-alt"></div>
						<div title="vault safe" class="dashicons-vault"></div>
						<div title="shield" class="dashicons-shield"></div>
						<div title="shield" class="dashicons-shield-alt"></div>
						<div title="sos help" class="dashicons-sos"></div>
						<div title="search" class="dashicons-search"></div>
						<div title="slides" class="dashicons-slides"></div>
						<div title="analytics" class="dashicons-analytics"></div>
						<div title="pie chart" class="dashicons-chart-pie"></div>
						<div title="bar chart" class="dashicons-chart-bar"></div>
						<div title="line chart" class="dashicons-chart-line"></div>
						<div title="area chart" class="dashicons-chart-area"></div>
						<div title="groups" class="dashicons-groups"></div>
						<div title="businessman" class="dashicons-businessman"></div>
						<div title="id" class="dashicons-id"></div>
						<div title="id" class="dashicons-id-alt"></div>
						<div title="products" class="dashicons-products"></div>
						<div title="awards" class="dashicons-awards"></div>
						<div title="forms" class="dashicons-forms"></div>
						<div title="testimonial" class="dashicons-testimonial"></div>
						<div title="portfolio" class="dashicons-portfolio"></div>
						<div title="book" class="dashicons-book"></div>
						<div title="book" class="dashicons-book-alt"></div>
						<div title="download" class="dashicons-download"></div>
						<div title="upload" class="dashicons-upload"></div>
						<div title="backup" class="dashicons-backup"></div>
						<div title="clock" class="dashicons-clock"></div>
						<div title="lightbulb" class="dashicons-lightbulb"></div>
						<div title="microphone mic" class="dashicons-microphone"></div>
						<div title="desktop monitor" class="dashicons-desktop"></div>
						<div title="tablet ipad" class="dashicons-tablet"></div>
						<div title="smartphone iphone" class="dashicons-smartphone"></div>
						<div title="phone" class="dashicons-phone"></div>
						<div title="index card" class="dashicons-index-card"></div>
						<div title="carrot food vendor" class="dashicons-carrot"></div>
						<div title="building" class="dashicons-building"></div>
						<div title="store" class="dashicons-store"></div>
						<div title="album" class="dashicons-album"></div>
						<div title="palm tree" class="dashicons-palmtree"></div>
						<div title="tickets (alt)" class="dashicons-tickets-alt"></div>
						<div title="money" class="dashicons-money"></div>
						<div title="smiley smile" class="dashicons-smiley"></div>
						<div title="thumbs up" class="dashicons-thumbs-up"></div>
						<div title="thumbs down" class="dashicons-thumbs-down"></div>
						<div title="layout" class="dashicons-layout"></div>
					</div>
					<div class="iconlist clearfix" id="tab-icons" >
						<?php include 'tpl.icon.php'; ?>
					</div>
				</div>
			</div>
	</div>
<script type="text/javascript">
	(function ($) {
		jQuery(document).ready(function($){
		    // menu sortable
			$('.admin-menus').sortable({
				items: '.admin-menu-item',
				cursor: 'move',
				containment: 'parent',
				placeholder: 'box box-placeholder'
			});
		});

		$('.admin-menus').on( "sortout", function( event, ui ) {
			ui.item.parent().find('.admin-menu-item').each(function(){
				var item = $(this).find('> div > input');
				if( item.val() != '' ){
					item.val( $(this).index() );
					item.attr('data-sort', $(this).index());
				}
			});
		});

		// tab
		$('#tab-icons').hide();
		$(document).on('click', '#tab-iconlist ul a', function(e){
			e.stopPropagation();
			e.preventDefault();
			var c = $('#tab-iconlist');
			c.find('.iconlist').hide();
			c.find('a.current').removeClass('current');
			$(this).addClass('current');
			$( $(this).attr('href') ).show();
			//console.log($( $(this).attr('href') ).find('div').length)
		});

		// icons dropdown
		var select_icon;
		$('#dropdown').on('show.bs.dropdown', function (e) {
		  var  t = $('#dropdown')
		  	  ,i = $(e.relatedTarget)
		  	  ,p = $( '#'+i.attr('id') ).parent().parent().position()
		  	  ;
		  select_icon = $( '#'+i.attr('id') );
		  $('div', '.iconlist').each(function(){
		  	$(this).removeClass('active');
		  	if($(this).hasClass( i.attr('class') )){
		  		$(this).addClass('active');
		  	}
		  });
		  t.css('top', p.top+42);
		})

		// select icon
		$(document).on('click', '.iconlist div', function(e){
			var c = $(this).attr('class');
			select_icon.attr('class', c);
			select_icon.next().val(c);
		});

	})(jQuery);
</script>
