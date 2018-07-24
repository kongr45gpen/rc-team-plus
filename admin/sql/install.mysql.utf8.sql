CREATE TABLE IF NOT EXISTS `#__rcteam_teams` (
    `TeamID` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `TeamName` varchar(60) NOT NULL,
    `TeamDesc` text,
    `published` tinyint(4) NOT NULL DEFAULT '1'
);


CREATE TABLE IF NOT EXISTS `#__rcteam_members` (
    `MemberID` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `ordering` int(6) NOT NULL DEFAULT '0',
    `TeamID` int(6) DEFAULT NULL,
    `MemberImage` varchar(255) DEFAULT NULL,
    `MemberName` varchar(60) NOT NULL,
    `MemberBio` text,
    `MemberRole` varchar(60) DEFAULT NULL,
    `MemberEmail` varchar(60) DEFAULT NULL,
    `MemberTwitter` varchar(60) DEFAULT NULL,
    `MemberFacebook` varchar(60) DEFAULT NULL,
    `MemberWebsite` varchar(255) DEFAULT NULL,
    `MemberInstagram` varchar(255) DEFAULT NULL,
    `MemberLinkedin` varchar(255) DEFAULT NULL,
    `MemberTumblr` varchar(255) DEFAULT NULL,
    `MemberYoutube` varchar(255) DEFAULT NULL,
    `MemberGithub` varchar(255) DEFAULT NULL,
    `MemberGoogleplus` varchar(255) DEFAULT NULL,  
    `published` TINYINT(4) NOT NULL DEFAULT '1'
);

CREATE TABLE IF NOT EXISTS `#__rcteam_config` (
  `ConfigID` tinyint(1) NOT NULL DEFAULT '1' PRIMARY KEY,
  `StyleSheet` varchar(255) NOT NULL
);

INSERT INTO `#__rcteam_config` (
    `ConfigID`, 
    `StyleSheet`
) VALUES (
    1, 
    'modern_responsive_white.css' 
);