var addthis_config = {
	data_track_clickback: "true",
	ui_open_windows: "true",
	ui_delay: "750",
	ui_offset_top: "0",
	ui_header_color: "#5f3812",
	ui_header_background: "#fbfbfb",
	
	services_custom: {
		name: "<?php echo __('Signaler') ?>",
		url: "http://grainedevie.seaflat.be/?url={{url}}&title={{title}}&description={{description}}",
		icon: "/images/signaler3.png"
	}
}