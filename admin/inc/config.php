<?php
	class cwp_robyConfig{
		public static $admin_page_menu_name ;
		public static  $admin_page_title 	;
		public static  $admin_page_header 	;
		public static  $admin_template_directory ;
		public static  $admin_template_directory_uri ;
		public static  $admin_uri 	;
		public static $admin_path  ;
		public static  $menu_slug 	;
		public static $structure;
		public static function init(){
			self::$admin_page_menu_name 	 = "Theme Options";
			self::$admin_page_title 		 = "Theme Options";
			self::$admin_page_header	 	 = "Theme Options";
			self::$admin_template_directory_uri  = get_template_directory_uri() . '/admin/layout';
			self::$admin_template_directory  = get_template_directory() . '/admin/layout';
			self::$admin_uri  		= 	get_template_directory_uri() . '/admin/';
			self::$admin_path 	 	= 	get_template_directory() . '/admin/';
			self::$menu_slug  		= 	"theme_options";
			self::$structure	= array(
						array(
							 "type"=>"tab",
							 "name"=>"General",
							 "options"=>array(
								array(
									"type"=>"image",
									"name"=>"Header logo",
									"description"=>"Select the logo image for the header",
									"id"=>"cwp_roby_logo",
									"default"=>get_template_directory_uri()."/images/logo-robi.png"
								),
								array(

									"type"=>"input_text",
									"name"=>"Footer Section Left Side - Title",
									"description"=>"Enter a title for the left side of the footer( e.g About the author).",
									"id"=>"cwp_roby_footertitle",
									"default"=>"About me"
								),
								array(

									"type"=>"textarea",
									"name"=>"Footer Section Left Side - Text",
									"description"=>"Enter text for the left side of the footer( e.g Auhtor description).",
									"id"=>"cwp_roby_footertext",
									"default"=>"Your description."
								),
								array(

									"type"=>"image",
									"name"=>"Footer Section Left Side - Image",
									"description"=>"Add a url for a image to show in the left side of the footer ( e.g Author picture).",
									"id"=>"cwp_roby_footerimg",
									"default"=>get_template_directory_uri()."/images/footer-logo.png"
								),
								array(

									"type"=>"input_text",
									"name"=>"Copyright",
									"description"=>"Use this field to add your Copyright.",
									"id"=>"cwp_roby_copyright",
									"default"=>"Example Copyright"
								),
							)
						),array(
							"type"=>"tab",
							"name"=>"Single Post Page",
							"options"=>array(
								array(
									"type"=>"select",
									"name"=>"Featured image",
									"description"=>"Show or hide featured image on single post page",
									"id"=>"cwp_roby_s_featureimg",
									"options"=>array("Show"=>"Show","Hide"=>"Hide"),
									"default"=>"Show"
								),
								array(
									"type"=>"select",
									"name"=>"Author info",
									"description"=>"Show or hide author informations on single post page",
									"id"=>"cwp_roby_authorinfo",
									"options"=>array("Show"=>"Show","Hide"=>"Hide"),
									"default"=>"Show"
								),
								array(
									"type"=>"select",
									"name"=>"Tags",
									"description"=>"Show or hide tags on single post page",
									"id"=>"cwp_roby_tags",
									"options"=>array("Show"=>"Show","Hide"=>"Hide"),
									"default"=>"Show"
								)
							)

						),array(
							"type"=>"tab",
							"name"=>"Blog ",
							"options"=>array(

								array(
									"type"=>"select",
									"name"=>"Featured image",
									"description"=>"Show or hide featured image on blog page",
									"id"=>"cwp_roby_b_featureimg",
									"options"=>array("Show"=>"Show","Hide"=>"Hide"),
									"default"=>"Show"
								)
							)

						) ,array(
							"type"=>"tab",
							"name"=>"Social networks ",
							"options"=>array(



								array(

									"type"=>"input_text",
									"name"=>"Facebook ",
									"description"=>"Add here your facebook link",
									"id"=>"cwp_roby_facebook_url",
									"default"=>""
								),
								array(

									"type"=>"input_text",
									"name"=>"Twitter link",
									"description"=>"Add here your facebook link",
									"id"=>"cwp_roby_twitter_link",
									"default"=>""
								),
								array(

									"type"=>"input_text",
									"name"=>"Rss link",
									"description"=>"Add here your Rss link.",
									"id"=>"cwp_roby_rss_link",
									"default"=>""
								),
								array(

									"type"=>"input_text",
									"name"=>"Linkedin",
									"description"=>"Use this field to Linkedin profile.",
									"id"=>"cwp_roby_linkedin_linkt",
									"default"=>""
								),
								array(

									"type"=>"input_text",
									"name"=>"Behance NETWORK",
									"description"=>"Use this field to add Behance NETWORK link.",
									"id"=>"cwp_roby_behance_link",
									"default"=>""
								),
							)

						)

					);

		}

	}
