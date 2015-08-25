<?php
	$sql = "

	ALTER TABLE `__PREFIX__resources` ADD `resourceCreated` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00' AFTER `resourceType`;

	ALTER TABLE `__PREFIX__resources` ADD `resourceUpdated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER `resourceCreated`;

    ALTER TABLE `__PREFIX__resources` ADD `resourceAWOL` TINYINT(1)  UNSIGNED  NOT NULL  DEFAULT '0'  AFTER `resourceUpdated`;

    ALTER TABLE `__PREFIX__resources` ADD INDEX `idx_awol` (`resourceAWOL`);

    ALTER TABLE `__PREFIX__resources` ADD `resourceTitle` CHAR(255)  NULL  DEFAULT NULL  AFTER `resourceAWOL`;

    ALTER TABLE `__PREFIX__resources` ADD `resourceFileSize` INT(10)  UNSIGNED  NULL  DEFAULT NULL  AFTER `resourceTitle`;

    ALTER TABLE `__PREFIX__resources` ADD `resourceWidth` INT(10)  UNSIGNED  NULL  DEFAULT NULL  AFTER `resourceFileSize`;

    ALTER TABLE `__PREFIX__resources` ADD `resourceHeight` INT(10)  UNSIGNED  NULL  DEFAULT NULL  AFTER `resourceWidth`;

    ALTER TABLE `__PREFIX__resources` ADD `resourceCrop` TINYINT(1)  UNSIGNED  NOT NULL  DEFAULT '0'  AFTER `resourceHeight`;

    ALTER TABLE `__PREFIX__resources` ADD `resourceDensity` FLOAT  NOT NULL  DEFAULT '1'  AFTER `resourceCrop`;

    ALTER TABLE `__PREFIX__resources` ADD `resourceTargetWidth` INT(10)  UNSIGNED  NULL  DEFAULT NULL  AFTER `resourceDensity`;

    ALTER TABLE `__PREFIX__resources` ADD `resourceTargetHeight` INT(10)  UNSIGNED  NULL  DEFAULT NULL  AFTER `resourceTargetWidth`;
    
    ALTER TABLE `__PREFIX__resources` ADD `resourceMimeType` CHAR(64) NULL  DEFAULT NULL  AFTER `resourceTargetHeight`;

    ALTER TABLE `__PREFIX__resources` ADD FULLTEXT INDEX `idx_search` (`resourceTitle`);

    ALTER TABLE `__PREFIX__resources` ADD `resourceInLibrary` TINYINT(1)  UNSIGNED  NOT NULL  DEFAULT '0'  AFTER `resourceMimeType`;

    ALTER TABLE `__PREFIX__resources` ADD INDEX `idx_library` (`resourceInLibrary`);

    CREATE TABLE IF NOT EXISTS `__PREFIX__resource_tags` (
      `tagID` INT(10) NOT NULL AUTO_INCREMENT,
      `tagTitle` VARCHAR(255) NOT NULL DEFAULT '',
      `tagSlug` VARCHAR(255) NOT NULL DEFAULT '',
      `tagCount` int(10) unsigned NOT NULL DEFAULT '0',
      PRIMARY KEY (`tagID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

    CREATE TABLE IF NOT EXISTS `__PREFIX__resources_to_tags` (
      `resourceID` int(10) NOT NULL DEFAULT '0',
      `tagID` int(10) NOT NULL DEFAULT '0',
      PRIMARY KEY (`resourceID`,`tagID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

    ";

    if (PerchUtil::count($DB->get_rows('SHOW TABLES LIKE \''.PERCH_DB_PREFIX.'content_resources\''))) {

            $sql .= "

            RENAME TABLE `__PREFIX__content_resources` TO `__PREFIX__resource_log`;

            ALTER TABLE `__PREFIX__resource_log` DROP PRIMARY KEY;

            ALTER TABLE `__PREFIX__resource_log` ADD `logID` INT(10)  UNSIGNED  NOT NULL  AUTO_INCREMENT  PRIMARY KEY FIRST;

            ALTER TABLE `__PREFIX__resource_log` ADD `appID` CHAR(32)  NOT NULL  DEFAULT 'content'  AFTER `logID`;

            ALTER TABLE `__PREFIX__resource_log` ADD `itemFK` CHAR(32)  NOT NULL  DEFAULT 'itemRowID'  AFTER `appID`;

            ALTER TABLE `__PREFIX__resource_log` ADD INDEX `idx_fk` (`itemFK`, `itemRowID`);

            ALTER TABLE `__PREFIX__resource_log` ADD UNIQUE INDEX `idx_uni` (`appID`, `itemFK`, `itemRowID`, `resourceID`);

            ";

    }


    $sql .= "

    CREATE TABLE IF NOT EXISTS `__PREFIX__resource_log` (
      `logID` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `appID` char(32) NOT NULL DEFAULT 'content',
      `itemFK` char(32) NOT NULL DEFAULT 'itemRowID',
      `itemRowID` int(10) unsigned NOT NULL,
      `resourceID` int(10) unsigned NOT NULL,
      PRIMARY KEY (`logID`),
      KEY `idx_resource` (`resourceID`),
      KEY `idx_fk` (`itemFK`,`itemRowID`),
      KEY `idx_uni` (`appID`,`itemFK`,`itemRowID`,`resourceID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

    ";




	$sql = str_replace('__PREFIX__', PERCH_DB_PREFIX, $sql);
	$queries = explode(';', $sql);
    if (PerchUtil::count($queries) > 0) {
        foreach($queries as $query) {
            $query = trim($query);
            if ($query != '') {
                $DB->execute($query);
                if ($DB->errored && strpos($DB->error_msg, 'Duplicate')===false) { 
                    echo '<li class="icon failure error">'.PerchUtil::html(PerchLang::get('The following error occurred:')) .'</li>';
                    echo '<li class="failure"><code class="sql">'.PerchUtil::html($query).'</code></li>';
                    echo '<li class="failure"><code>'.PerchUtil::html($DB->error_msg).'</code></p></li>';
                    $errors = true;
                }
            }
        }
    }

    include(PERCH_CORE.'/apps/assets/PerchAssets_Assets.class.php');
    include(PERCH_CORE.'/apps/assets/PerchAssets_Asset.class.php');
    $Assets = new PerchAssets_Assets();

    $Assets->import_from_perch_gallery();

    $Assets->reindex();