(function($){

	var k = function(o){
		console.log(o);
	};

	var toHex = function(color){
		return color.replace('0x', '#');
	};

	$(function(){

		var wpins = function (jqObj, index){
			var self = this;
			var sc = {};

			//get the xml file path
			self.index = index;
			self.xml     = jqObj.attr('flashvars');
			self.xmlPath = self.xml.replace('myURL=', '');
			self.config  = {};
			self.content = [];

			self.tpl = function (){
				return '<div class="inslider-inner">'+
			               '<div class="TB_Wrapper">'+
			                 '<div class="Slides">'+
				             '</div>'+
			               '</div>'+
		                '</div>';
			};

			self.slideTpl = function(obj){
				return '<div class="Slide">'+
					     '<img src="'+obj.img+'" alt="img'+obj.alt+'">'+
						 '<div class="inslider-infobox">'+
							'<p class="inslider-info-title '+ ( (sc.show_caption === 'yes') ? '' : 'hide' )+'">'+obj.title+'</p>'+
							'<p class="inslider-info-content '+ ( (sc.show_desc === 'yes') ? '' : 'hide' )+'">'+obj.description+'</p>'+
							'<p><a href="'+obj.link+'" target="'+self.config.target+'" class="inslider-info-viewmore '+ ( (sc.showreadmore === 'yes') ? '' : 'hide' )+'">'+obj.readMore+'</a></p>'+
						 '</div>'+
					   '</div>';
			}

			self.replace = function(){
				jqObj.wrap('<div class="inslider" id="inslider'+self.index+'"></div>');
				self.$container = $(jqObj.parent('.inslider'));
				self.$container.empty().append(self.tpl);
			};

			self.addImgs = function(){
				var Imgs = '';
				for(var i = 0; i < self.nContentL; i++){
					Imgs += self.slideTpl(self.content[i]);
				}
				self.$container.find('.Slides').append(Imgs);
			};

			self.transBanner = function(){
				self.$container.find('.TB_Wrapper').TransBanner(self.TransBannerOpts);
			};

			self.addStyle = function(el, obj){
				return $(el).css(obj);
			};

			self.initSize = function(){
				self.addStyle('#inslider'+self.index, {'max-width':sc.bannerWidth+'px', 'height':sc.bannerHeight,'background':sc.slideshowbackgroundcolor});
				self.addStyle('#inslider'+self.index+' .inslider-inner', {'max-width':(sc.bannerWidth-20)+'px', 'height':sc.bannerHeight-20});
			};

			self.controller = function(){
				
				var removeNum = setInterval(function(){
					var navHolder = self.$container.find('.navHolder');
					var $navHolder = $(navHolder[1]);
					if($navHolder.length !== 0){
						clearInterval(removeNum);
						if(sc.ImageScaling !== 'yes'){
							self.addStyle('.TB_Wrapper .Slide img', {'width': 'auto', 'height': 'auto'});
						}
						if(sc.showbuttons === 'yes'){

							$navHolder.css({
								'left' : (Number(sc.buttonsXPos)+88)+'px',
								'top' : (Number(sc.buttonsYPos)+28)+'px',
								'bottom' : '',
								'right' : ''
							});

							// set auto hide button
							if(sc.autohidebuttons === 'yes'){
								$navHolder.addClass('hide');
								self.$container.bind({
									mouseover: function(){
										$navHolder.removeClass('hide');
									},
									mouseout: function(){
										$navHolder.addClass('hide');
									}
								});
							}

						}else{
							$navHolder.addClass('hide');
						}
						
					}
				}, 100);
			};

			self.render = function(){
				self.addStyle('#inslider'+self.index+' .inslider-info-viewmore', {'font-size':sc.readmore_size, 'font-family':sc.fontface, 'color':sc.readmore_color, 'text-decoration': (sc.readmore_underline === 'true') ? 'underline' : 'none'})
				self.addStyle('#inslider'+self.index+' .inslider-info-title', {'font-size':sc.title_size, 'font-family':sc.fontface, 'color':sc.title_color});
				self.addStyle('#inslider'+self.index+' .inslider-info-content', {'font-size':sc.desc_size, 'font-family':sc.fontface, 'color':sc.desc_color});
			};

			self.build = function(){
				self.replace();
				self.addImgs();
				self.initSize();
				self.transBanner();
				self.controller();
				self.render();
			};

			//parse the xml and store the data
			var parseXml = function(xmlOjb){
				self.xml = $(xmlOjb);

				// globle config
				self.configBox = self.xml.find('config');
				self.$configBox = $(self.configBox);
				//globle config
				self.config = {
					'bannerWidth'                     : self.$configBox.attr('bannerWidth'),
					'bannerHeight'                    : self.$configBox.attr('bannerHeight'),
					'slideshowbackgroundcolor'        : toHex(self.$configBox.attr('slideshowbackgroundcolor')),
					'descriptionbackgroundcolor'      : toHex(self.$configBox.attr('descriptionbackgroundcolor')),
					'descriptionbackgroundwidth'      : self.$configBox.attr('descriptionbackgroundwidth'),
					'buttonsbackgroundcolor'          : toHex(self.$configBox.attr('buttonsbackgroundcolor')),
					'buttonsXPos'                     : self.$configBox.attr('buttonsXPos'),
					'buttonsYPos'                     : self.$configBox.attr('buttonsYPos'),
					'autoplay'                        : self.$configBox.attr('autoplay'),
					'transitiontimedelay'             : self.$configBox.attr('transitiontimedelay'),

					'timerColor_1'                    : toHex(self.$configBox.attr('timerColor_1')),
					'timerColor_2'                    : toHex(self.$configBox.attr('timerColor_2')),
					'showbuttons'                     : self.$configBox.attr('showbuttons'),
					'autohidebuttons'                 : self.$configBox.attr('autohidebuttons'),
					'showbuttonshandcursor'           : self.$configBox.attr('showbuttonshandcursor'),
					
					
					// 'buttonrolloverbackgroundcolor'   : toHex(self.$configBox.attr('buttonrolloverbackgroundcolor')),
					// 'buttonrolloversymbolcolor'       : toHex(self.$configBox.attr('buttonrolloversymbolcolor')),
					// 'buttonrolloutbackgroundcolor'    : toHex(self.$configBox.attr('buttonrolloutbackgroundcolor')),
					// 'buttonrolloutsymbolcolor'        : toHex(self.$configBox.attr('buttonrolloutsymbolcolor')),

					// 'pricetagImage'                   : self.$configBox.attr('pricetagImage'),
					// 'pricebuttonXPos'                 : self.$configBox.attr('pricebuttonXPos'),
					// 'pricebuttonYPos'                 : self.$configBox.attr('pricebuttonYPos'),
					// 'pricebuttonshow'                 : self.$configBox.attr('pricebuttonshow'),
					'ImageScaling'                    : self.$configBox.attr('ImageScaling'),
					'target'                          : self.$configBox.attr('target'),
					'fontface'						  : self.$configBox.attr('fontface'),
					'showreadmore'                    : self.$configBox.attr('showreadmore'),
					'readmore_text'                   : self.$configBox.attr('readmore_text'),
					'transitionnumber'                : self.$configBox.attr('transitionnumber'),
					'readmore_size'                   : self.$configBox.attr('readmore_size') + 'px',
					'readmore_color'                  : toHex(self.$configBox.attr('readmore_color')),
					'readmore_underline'              : self.$configBox.attr('readmore_underline'),
					'show_caption'                    : self.$configBox.attr('show_caption'),
					'title_size'                      : self.$configBox.attr('title_size') + 'px',
					'title_color'                     : self.$configBox.attr('title_color'),
					'show_desc'                       : self.$configBox.attr('show_desc'),
					'desc_size'                       : self.$configBox.attr('desc_size') + 'px',
					'desc_color'                      : self.$configBox.attr('desc_color'),

					// 'show_price'                      : self.$configBox.attr('show_price'),
					// 'price_size'                      : self.$configBox.attr('price_size') + 'px',
					// 'currency_symbol'                 : self.$configBox.attr('currency_symbol'),
					//'wmode'                           : self.$configBox.attr('wmode'),
				};
				sc = self.config;
				
				// img config
				self.nContent = self.xml.find('Content');
				self.nContentL = self.nContent.length;		

				for(var i = 0; i < self.nContentL; i++){
					$this = $(self.nContent[i]);
					self.content[i] = {
						'alt'         : i,
						'img'         : $this.find('Image').text(),
						'title'       : $this.find('title').text(),
						'description' : $this.find('description').text(),
						'readMore'    : $this.find('ReadMore').text(),
						'link'        : $this.find('link').text(),
					};
				}

				self.TransBannerOpts = {
					slide_delaytime                  : sc.transitiontimedelay/1000,
					slide_autoplay                   : (sc.autoplay === 'yes') ? true : false ,
					button_show_back                 : true,
					button_margin                    : 12,
					button_numbers_autohide          : false,
					button_numbers_horizontal        : true,
					image_align_center			     : false,
					image_resize					 : true,
					image_resize_to_fit              : false ,
					caption_padding_x                : 14,
					caption_padding_y                : 24,			
					caption_float_mode               : true,
					caption_position_x               : sc.bannerWidth-20-sc.descriptionbackgroundwidth,
					caption_position_y               : 0,
					caption_bg_color                 : sc.descriptionbackgroundcolor,
					caption_bg_opacity               : .1,
					caption_width                    : sc.descriptionbackgroundwidth,
					caption_height                   : sc.bannerHeight-20,	
					caption_bg_radius                : 0,
					responsive                       : true,
					responsive_limit_autoplay        : '', 
					responsive_limit_caption         : 480,
					responsive_limit_navigation      : 480,
					responsive_limit_navigation_type : 2, 
					responsive_screen_based_limits   : true,
					button_show_numbers              : false
				};

				self.build();
			};

			//the excute part
			//get data by xml
			$.ajax({
			  type: "GET",
			  url: self.xmlPath,
			  dataType: "xml",
			  success: parseXml
			});
		};

		$('embed').each(function(index){
			new wpins($(this), index);
		});
	});
})(jQuery);