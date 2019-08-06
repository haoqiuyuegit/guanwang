/*
Navicat MySQL Data Transfer

Source Server         : gw
Source Server Version : 50562
Source Host           : tp.caowenbin.top:3306
Source Database       : tp_caowenbin_top

Target Server Type    : MYSQL
Target Server Version : 50562
File Encoding         : 65001

Date: 2019-08-06 14:03:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for about
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO `about` VALUES ('1', '微享，不只是朋友圈中的分享', '微享基于微信为用户提供开发、运营、培训、推广一体化解决方案，帮助用户搭建新一代微商分销体系，实现线上线下互通和客户沉淀。微享以直销模式+代理+熟人经济的模式帮助微商快速建立分销渠道，让粉丝主动传播和宣传产品。', '<p><span style=\"color: rgb(0, 0, 0); font-size: 22px;\">经验</span><br></p><p style=\"margin-left: 0px;\">拥有超过2年行业经验的资深团队及设计开发经验，服务上百家品牌企业。</p><h2 style=\"margin-left: 0px;\">专业</h2><p style=\"margin-left: 0px;\">我们整合商业思考，不断追求完美和卓越，渴望成为潮流的引领者。</p><h2 style=\"margin-left: 0px;\">创新</h2><p style=\"margin-left: 0px;\">我们摒弃墨守成规、腐朽不堪的设计理念和页面风格设计，希望能创造更多独特精彩的作品。</p>', '/uploads/about/20190802/4af97afe41f57522c67e3ea1498c0210.jpg');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '管理员账号',
  `password` varchar(255) NOT NULL COMMENT '管理员密码',
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL COMMENT '''不忘初心，方得始终''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '7fef6171469e80d32c0559f88b377245', '秋月小姐姐', '/uploads/people/20190802/15754f6b9287e85805d9e1f944814c19.jpg', '不忘初心，方得始终啊');

-- ----------------------------
-- Table structure for case
-- ----------------------------
DROP TABLE IF EXISTS `case`;
CREATE TABLE `case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of case
-- ----------------------------
INSERT INTO `case` VALUES ('5', '案例展示', '/uploads/case/20190805/98d4739afc53cdf99dd8a4a03fe4e424.jpg', '<p>测绘师解决阿范德萨发撒旦啊法萨芬</p>', '2019-08-05 15:12:22');
INSERT INTO `case` VALUES ('6', '案例展示', '/uploads/case/20190805/d577ebcec654507b8e6b25ecf4daa4cd.jpg', '<p>阿范德萨发轨道上健康老人太多要还房贷SD敢达</p>', '2019-08-05 15:12:38');
INSERT INTO `case` VALUES ('7', '案例展示', '/uploads/case/20190805/ecfc32b0441880bc3dc93f3d981ce0b8.jpg', '<p>方式当凤凰健康撒大哥好</p>', '2019-08-05 15:12:49');
INSERT INTO `case` VALUES ('8', '案例展示', '/uploads/case/20190805/65d70922ec18082bae0a2c444b284ed0.jpg', '<p>飞洒的韩国进口桑德官方三房</p>', '2019-08-05 15:13:05');
INSERT INTO `case` VALUES ('9', '案例展示', '/uploads/case/20190805/5fa8dc6dd8d038110ea65568c56273b1.jpg', '<p>阿萨德更健康是大法官感到十分</p>', '2019-08-05 15:13:17');
INSERT INTO `case` VALUES ('10', '案例展示', '/uploads/case/20190805/501e8d87297211d6c3ec892d9c195024.jpg', '<p>阿斯蒂芬就开始对方过后</p>', '2019-08-05 15:13:29');
INSERT INTO `case` VALUES ('11', '案例展示', '/uploads/case/20190805/05e6e9ab23ace55022e3de0ee400f51c.jpg', '<p>爱神的箭和撒旦法规</p>', '2019-08-05 15:13:40');
INSERT INTO `case` VALUES ('12', '案例展示', '/uploads/case/20190805/657e68a069a9d566233228def3c5b694.jpg', '<p>傻大个法撒旦法规</p>', '2019-08-05 15:13:51');

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES ('1', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打<span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师打</span><span style=\"color: rgb(51, 51, 51);\">&nbsp;发发生大法师打暗室逢灯三士大夫撒法萨芬撒法法师</span><img alt=\"Image 4.png\" src=\"/uploads/simditor/20190805/331fb0eaa2622d4c9867fa2d5a0a248f.png\" width=\"1235\" height=\"187\"></p>', '与我们保持联络是快速解决您问题的唯一途径！');

-- ----------------------------
-- Table structure for footer
-- ----------------------------
DROP TABLE IF EXISTS `footer`;
CREATE TABLE `footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '公司名称',
  `address` varchar(255) NOT NULL COMMENT '公司地址',
  `phone` varchar(255) NOT NULL COMMENT '联系方式',
  `site` varchar(255) NOT NULL,
  `wx_img` varchar(255) NOT NULL COMMENT '微信服务号',
  `footer_one` varchar(255) NOT NULL,
  `footer_two` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of footer
-- ----------------------------
INSERT INTO `footer` VALUES ('1', '广东澳新考拉信息技术有限公司', '汕头市龙湖区高新区嘉泽中心大厦7B01', '020-2222222', 'http://www.ozkoalas.com/', '/uploads/footer/20190806/ce2d0d25eb46bb1caa546c2267def380.png', 'Copyright © 2003-2016 广州澳新考拉信息技术有限公司 All Rights Reserved　粤ICP备123456号　', 'Power by weshared');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `description` varchar(255) NOT NULL COMMENT '产品描述',
  `Introduction` varchar(255) NOT NULL COMMENT '功能介绍',
  `image` varchar(255) NOT NULL COMMENT '缩略图',
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '编辑', '发到付', '法法师打', '/uploads/goods/20190805/0ba3c1575b32b7754c1164bcc030fe0a.png', '2019-08-05 12:20:56');
INSERT INTO `goods` VALUES ('3', '产品', '产品描述', '功能描述', '/uploads/goods/20190805/c913478adc421d11b6324b3209f8b82e.png', '2019-08-05 15:07:42');
INSERT INTO `goods` VALUES ('4', '产品', '产品描述', '我是产品描述', '/uploads/goods/20190805/e0b06bedea825f6ed10718f04eafd4c9.png', '2019-08-05 15:25:39');

-- ----------------------------
-- Table structure for nav
-- ----------------------------
DROP TABLE IF EXISTS `nav`;
CREATE TABLE `nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(4) NOT NULL COMMENT '导航名称',
  `description` varchar(255) NOT NULL COMMENT '导航描述',
  `image` varchar(255) NOT NULL COMMENT '导航封面图',
  `create_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nav
-- ----------------------------
INSERT INTO `nav` VALUES ('1', '关于微享', '我是描述', '/uploads/nav/20190801/5c72926dcce2dadc5b873ffc9d419b77.jpg', '2019-08-01 16:12:38');
INSERT INTO `nav` VALUES ('2', '新闻动态', '曹文斌描述', '/uploads/nav/20190801/e80037e34732a57acc9966cc0e8753e7.jpg', '2019-08-01 16:13:48');
INSERT INTO `nav` VALUES ('3', '案例展示', '我是案例展示描述', '/uploads/nav/20190801/d7c80ce69dc599ca2367b55a6bfdfa63.jpg', '2019-08-01 17:15:00');
INSERT INTO `nav` VALUES ('4', '微享产品', '我是', '/uploads/nav/20190801/089ee2513e837bad239b656c996f1b8e.png', '2019-08-01 17:15:46');
INSERT INTO `nav` VALUES ('5', '招贤纳士', '我是招贤纳士', '/uploads/nav/20190801/9337642bfc3ee6b30b1e96ef702bb682.jpg', '2019-08-01 17:16:22');
INSERT INTO `nav` VALUES ('6', '联系我们', '我是联系我们', '/uploads/nav/20190801/7a2412f00106d5c4a3d43d6058fc84ad.png', '2019-08-01 17:17:14');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '新闻资讯---标题',
  `description` varchar(255) NOT NULL COMMENT '新闻资讯---描述',
  `image` varchar(255) NOT NULL COMMENT '新闻资讯---封面图',
  `create_time` date NOT NULL COMMENT '新闻资讯---发布时间',
  `content` longtext NOT NULL,
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '查看次数',
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('4', '阿士大夫撒旦分公司东方闪电', '发多发送达方式大', '/uploads/news/20190805/b599c0f6578ba0a46e968baced6a8c1c.jpg', '2019-08-05', '<ol><li>发多发送达方式大</li><li>法法师打</li><li>啥发送达方式大</li><li>撒飞洒地方撒旦</li><li>法萨芬撒飞洒的</li></ol>', '0', '发送达方式大');
INSERT INTO `news` VALUES ('6', '英脱欧事务大臣促请欧盟放弃对立', '　中新网8月5日电 据欧联网援引欧联通讯社报道，当地时间4日，', '/uploads/news/20190805/6f7fc7402342ba0d6bae8c1955b781c2.jpg', '2019-08-05', '<p style=\"margin-left: 0px;\">　　<a target=\"_blank\" href=\"http://www.chinanews.com/\">中新网</a>8月5日电 据欧联网援引欧联通讯社报道，当地时间4日，英国脱欧事务大臣斯蒂芬•巴克利在英媒上撰文表示，欧盟领导人必须放弃对立姿态，与英国重启脱欧谈判，否则英国无协议脱欧将走上正轨。</p><p style=\"margin-left: 0px;\">　　巴克利在英国《每日邮报》撰文指出，在5月举行欧洲议会选举中，有61%为新议员，标志着政治现实已出现根本性转变，也意味欧盟的姿态是时候改变。</p><p style=\"margin-left: 0px;\">　　巴克利呼吁欧盟领导人，允许欧盟负责英国脱欧谈判的首席代表米歇尔‧巴尼耶与英国谈判，并指巴尼耶应敦促欧盟领导人考虑相关问题。若想达成协议，应让双方寻求共识，否则英国将会进行无协议脱欧。</p><p style=\"margin-left: 0px;\">　　据报道，英国首相鲍里斯•约翰逊此前表明，不论是否有协议，都会在10月31日脱欧，并要求将“备份安排”(backstop)从脱欧协议中剔除。约翰逊的首席幕僚康宁思近日曾向内阁官员表示，如果议员在9月或10月进行不信任案表决，大选会在10月31日后举行，不管怎样都还是会脱欧。(钟欣铭)</p>', '1', '张三');
INSERT INTO `news` VALUES ('7', '英工党称无协议脱欧仍可避免 或考虑跨党派合作', '　中新网8月5日电 据外媒报道，英国首相约翰逊的首席幕僚康宁思日前称，', '/uploads/news/20190805/8f856ab9499dc4c602ff0ad8eed32f46.jpg', '2019-08-05', '<p style=\"margin-left: 0px;\">　　<a target=\"_blank\" href=\"http://www.chinanews.com/\">中新网</a>8月5日电 据外媒报道，英国首相约翰逊的首席幕僚康宁思日前称，即使议员在秋季通过对首相的不信任投票，大选会在10月31日后举行，这无法阻止英国到期脱离欧盟。工党回应称，如果唐宁街认为议员们阻止无协议脱欧是为时已晚，那就想错了。</p><table><colgroup><col></colgroup><thead><tr></tr></thead></table><p style=\"margin-left: 0px;\">　　报道称，影子卫生大臣阿什沃思(Jonathan Ashworth)表示，他不接受康宁思的观点，即即使议员在9月或10月通过对首相的不信任投票，选举时间表已意味着，任何大选都无法及时阻止英国在10月31日脱离欧盟。</p><p style=\"margin-left: 0px;\">　　阿什沃思认为，“当议会9月回来时，我们还有机会阻止无协议脱欧。”据悉，英国下议院将休会到9月3日。</p><p style=\"margin-left: 0px;\">　　报道指出，康宁思的观点是基于英国下议院图书馆的分析，因为依据定期国会法(FTPA)给出的时间表，为了保证能够在10月31日前大选，不信任案表决须是在9月3日进行。而为了在9月3日举行表决，工党领袖科尔宾应在议会休会前，提出不信任动议。但他并未提出。</p><p style=\"margin-left: 0px;\">　　据报道，在接受英国天空电视台采访时，阿什沃思并未提及有关该时间表的争论，但他表示在秋季，议员还有其他机制可以使用。</p><p style=\"margin-left: 0px;\">　　他说，“因为政府必须提出适当的立法，为他们所想要的无协议脱欧做准备。我们将使用一切可行的手段，进行跨党派合作，因为我们知道有很多保守党议员也想阻止无协议脱欧，特别是鲍里斯·约翰逊两周前从内阁解雇的人。”</p><p style=\"margin-left: 0px;\">　　目前，财政大臣菲利普·哈蒙德、司法大臣大卫·高克、国际发展大臣罗里·斯图尔特、能源大臣克莱尔·佩里等已相继从内阁辞职。</p>', '3', '张三');

-- ----------------------------
-- Table structure for nice
-- ----------------------------
DROP TABLE IF EXISTS `nice`;
CREATE TABLE `nice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nice
-- ----------------------------
INSERT INTO `nice` VALUES ('1', '微享优势', '在小的品牌也有自己的微享');

-- ----------------------------
-- Table structure for nice_detail
-- ----------------------------
DROP TABLE IF EXISTS `nice_detail`;
CREATE TABLE `nice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nice_detail
-- ----------------------------
INSERT INTO `nice_detail` VALUES ('1', '无需代码，可视化拖拽操作', '操作简单，会用鼠标即可建站\r\n\r\n彻底打破技术门槛\r\n\r\n成倍节省网站维护成本', '/uploads/nice_detail/20190806/047ebc564a155c9a77cb56abd7f97973.png');
INSERT INTO `nice_detail` VALUES ('3', '无需代码，可视化拖拽操作', '操作简单，会用鼠标即可建站\r\n\r\n彻底打破技术门槛\r\n\r\n成倍节省网站维护成本', '/uploads/about/20190806/86b14745687296344c0d9fdb5acd5fca.png');
INSERT INTO `nice_detail` VALUES ('4', '无需代码，可视化拖拽操作', '操作简单，会用鼠标即可建站\r\n\r\n彻底打破技术门槛\r\n\r\n成倍节省网站维护成本', '/uploads/about/20190806/e162066422f57f94ce076af23cfb9a34.png');
INSERT INTO `nice_detail` VALUES ('5', '纯云结构，快速安全稳定', '操作简单，会用鼠标即可建站\r\n\r\n彻底打破技术门槛\r\n\r\n成倍节省网站维护成本', '/uploads/about/20190806/9a724c5d5c0476d36de8326b833c2a68.png');

-- ----------------------------
-- Table structure for recruit
-- ----------------------------
DROP TABLE IF EXISTS `recruit`;
CREATE TABLE `recruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recruit
-- ----------------------------
INSERT INTO `recruit` VALUES ('2', 'php工程师', '<p>发放地方发&nbsp;发生发打发似的</p>', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for slide
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '轮播图标题',
  `description` varchar(255) NOT NULL COMMENT '轮播图描述',
  `image` varchar(255) NOT NULL COMMENT '轮播图',
  `create_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slide
-- ----------------------------
INSERT INTO `slide` VALUES ('16', '我是轮播图', '我是轮播a描述', '/uploads/slide/20190801/7f4b8048c96ff9cfa8b9f4d6364f795f.png', '2019-08-01 16:08:59');
INSERT INTO `slide` VALUES ('20', '轮播图', '我是轮播图一描述', '/uploads/slide/20190806/660185b685918ed53009ae2c1d72b278.jpg', '2019-08-06 09:53:55');
SET FOREIGN_KEY_CHECKS=1;
