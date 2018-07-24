<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// add stylesheet
$doc = JFactory::getDocument();
$css_path = JURI::root().'media/com_rcteam/assets/css/'.$this->styleSheet.'?'.filemtime(JPATH_ROOT.'/media/com_rcteam/assets/css/'.$this->styleSheet);
$doc->addStyleSheet($css_path);

//display content
?>
<div class="rc_team">
    <h2><?php echo $this->teamName; ?></h2>
    <p><?php echo $this->teamDesc; ?></p>
    <?php
    foreach($this->teamMembers as $member) {

        ?><div class="rc_member <?php echo ($this->columns > 0) ? 'rc_member_'.$this->columns.'col' : 'rc_member_fixed'; ?>">
            <?php
            if ($member->MemberName != '') { ?>
                <h2><?php echo $member->MemberName ?></h2>
            <?php } ?>
            <?php
            if ($member->MemberRole != '') { ?>
                <h3><?php echo $member->MemberRole ?></h3>
            <?php } ?>
            <?php
            if ($member->MemberImage != '') { ?>
                <div class="rc_member_img" style="background-image: url('<?php echo JURI::root(false) . $member->MemberImage ?>');"></div>
            <?php } ?>
            <div class="rc_member_details">
                <?php //email
                if ($member->MemberBio != '') { ?>
                    <p><?php echo $member->MemberBio ?></p>
                <?php } ?>   
                <ul class="rc_member_details">
                    <?php //email
                    if ($member->MemberEmail != '') { ?>
                        <a href="mailto:<?php echo $member->MemberEmail ?>"><li><img class="rc_member_icon" src="<?php echo JURI::root(false)?>media/com_rcteam/assets/img/email.png" /></li></a>
                    <?php } ?>
                    <?php //website
                    if ($member->MemberWebsite != '') { ?>
                        <a href="<?php echo $member->MemberWebsite ?>" target="_blank"><li><img class="rc_member_icon" src="<?php echo JURI::root(false)?>media/com_rcteam/assets/img/website.png" /></li></a>
                    <?php } ?>
                    <?php //twitter
                    if ($member->MemberTwitter != '') { ?>
                        <a href="<?php echo $member->MemberTwitter ?>" target="_blank"><li><img class="rc_member_icon" src="<?php echo JURI::root(false)?>media/com_rcteam/assets/img/twitter.png" /></li></a>
                        <?php } ?>
                    <?php //facebook
                    if ($member->MemberFacebook != '') { ?>
                        <a href="<?php echo $member->MemberFacebook ?>" target="_blank"><li><img class="rc_member_icon" src="<?php echo JURI::root(false)?>media/com_rcteam/assets/img/facebook.png" /></li></a>
                        <?php } ?>
                    <?php //instagram
                    if ($member->MemberInstagram != '') { ?>
                        <a href="<?php echo $member->MemberInstagram ?>" target="_blank"><li><img class="rc_member_icon" src="<?php echo JURI::root(false)?>media/com_rcteam/assets/img/instagram.png" /></li></a>
                    <?php } ?>
                    <?php //linkedin
                    if ($member->MemberLinkedin != '') { ?>
                        <a href="<?php echo $member->MemberLinkedin ?>" target="_blank"><li><img class="rc_member_icon" src="<?php echo JURI::root(false)?>media/com_rcteam/assets/img/linkedin.png" /></li></a>
                    <?php } ?>
                    <?php //tumblr
                    if ($member->MemberTumblr != '') { ?>
                        <a href="<?php echo $member->MemberTumblr ?>" target="_blank"><li><img class="rc_member_icon" src="<?php echo JURI::root(false)?>media/com_rcteam/assets/img/tumblr.png" /></li></a>
                    <?php } ?>
                    <?php //youtube
                    if ($member->MemberYoutube != '') { ?>
                        <a href="<?php echo $member->MemberYoutube ?>" target="_blank"><li><img class="rc_member_icon" src="<?php echo JURI::root(false)?>media/com_rcteam/assets/img/youtube.png" /></li></a>
                    <?php } ?>
                    <?php //github
                    if ($member->MemberGithub != '') { ?>
                        <a href="<?php echo $member->MemberGithub ?>" target="_blank"><li><img class="rc_member_icon" src="<?php echo JURI::root(false)?>media/com_rcteam/assets/img/github.png" /></li></a>
                    <?php } ?>
                    <?php //googleplus
                    if ($member->MemberGoogleplus != '') { ?>
                        <a href="<?php echo $member->MemberGoogleplus ?>" target="_blank"><li><img class="rc_member_icon" src="<?php echo JURI::root(false)?>media/com_rcteam/assets/img/googleplus.png" /></li></a>
                    <?php } ?>
                </ul>
            </div>
        </div><?php
    }?>
</div>