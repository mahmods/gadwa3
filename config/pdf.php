<?php
return [
	'font_path' => base_path('resources/fonts/'),
	'font_data' => [
		'examplefont' => [
			'R'  => 'NeoSans-regular.ttf',    // regular font
			'B'  => 'NeoSans-bold.ttf',       // optional: bold font
			'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
			'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
		]
		// ...add as many as you want.
		],
	'mode'                 => '',
	'format'               => 'A4',
	'default_font_size'    => '12',
	'default_font'         => 'tahoma',
	'margin_left'          => 5,
	'margin_right'         => 5,
	'margin_top'           => 5,
	'margin_bottom'        => 5,
	'margin_header'        => 0,
	'margin_footer'        => 0,
	'orientation'          => 'P',
	'title'                => 'Gadwa',
	'author'               => 'Gadwa',
	'watermark'            => 'www.Gadwa.com',
	'show_watermark'       => true,
	'watermark_font'       => 'sans-serif',
	'display_mode'         => 'fullpage',
	'watermark_text_alpha' => 0.1,

];