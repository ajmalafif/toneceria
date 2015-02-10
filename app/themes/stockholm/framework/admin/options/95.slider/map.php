<?php

$sliderPage = new QodeAdminPage("10", "Select Slider");
$qodeFramework->qodeOptions->addAdminPage("slider",$sliderPage);

// General Style

$panel3 = new QodePanel("General Style","navigation_control_style");
$sliderPage->addChild("panel3",$panel3);

	$qs_slider_height_mobile = new QodeField("text","qs_slider_height_mobile","","Slider Height For Mobile Devices (px)","Define slider height for mobile devices");
	$panel3->addChild("qs_slider_height_mobile",$qs_slider_height_mobile);

// Navigation Style

$panel1 = new QodePanel("Navigation Style","navigation_style");
$sliderPage->addChild("panel1",$panel1);

	$group1 = new QodeGroup("Navigation Style","Define styles for Select Slider navigation.");
	$panel1->addChild("group1",$group1);
		$row1 = new QodeRow();
		$group1->addChild("row1",$row1);

			$qs_navigation_color = new QodeField("colorsimple","qs_navigation_color","","Color","Choose the most dominant theme color. Default color is #ffffff.");
			$row1->addChild("qs_navigation_color",$qs_navigation_color);

			$qs_navigation_hover_color = new QodeField("colorsimple","qs_navigation_hover_color","","Hover Color","Choose the most dominant theme color. Default color is #ffffff.");
			$row1->addChild("qs_navigation_hover_color",$qs_navigation_hover_color);

			$qs_navigation_background_color = new QodeField("colorsimple","qs_navigation_background_color","","Background Color","Choose the most dominant theme color. Default color is #a6a6a6.");
			$row1->addChild("qs_navigation_background_color",$qs_navigation_background_color);

			$qs_navigation_background_hover_color = new QodeField("colorsimple","qs_navigation_background_hover_color","","Background Hover Color","Choose the most dominant theme color. Default color is #393939.");
			$row1->addChild("qs_navigation_background_hover_color",$qs_navigation_background_hover_color);

		$row2 = new QodeRow();
		$group1->addChild("row2",$row2);	

			$qs_navigation_border_color = new QodeField("colorsimple","qs_navigation_border_color","","Border Color","Choose the most dominant theme color. Default color is transparent.");
			$row1->addChild("qs_navigation_border_color",$qs_navigation_border_color);

			$qs_navigation_border_hover_color = new QodeField("colorsimple","qs_navigation_border_hover_color","","Border Hover Color","Choose the most dominant theme color. Default color is transparent.");
			$row1->addChild("qs_navigation_border_hover_color",$qs_navigation_border_hover_color);

// Navigation Control Style

$panel2 = new QodePanel("Navigation Control Style","navigation_control_style");
$sliderPage->addChild("panel2",$panel2);

	$qs_navigation_control_color = new QodeField("color","qs_navigation_control_color","","Color","Default color is #fffff.");
	$panel2->addChild("qs_navigation_control_color",$qs_navigation_control_color);