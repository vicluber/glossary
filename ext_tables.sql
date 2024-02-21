CREATE TABLE tx_glossary_domain_model_item (
	sorting int(11) DEFAULT '0' NOT NULL,
	term varchar(255) NOT NULL DEFAULT '',
	path_segment varchar(2048),
	teaser text DEFAULT '',
	description text DEFAULT '',
	file int(11) unsigned NOT NULL DEFAULT '0',
	meta_title varchar(255) NOT NULL DEFAULT '',
	meta_description varchar(255) NOT NULL DEFAULT '',
	index_this_page tinyint DEFAULT '1',
	follow_this_page tinyint DEFAULT '1',
	show_in_overview tinyint DEFAULT '1',

	KEY path_segment (path_segment(185), uid)
);
