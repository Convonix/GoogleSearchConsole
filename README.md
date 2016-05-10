# Google APIs Client Library for PHP #

## Description ##
The Google API Client Library enables you to work with Google APIs such as Google+, Drive, or YouTube on your server.

## Requirements ##
* [PHP 5.2.1 or higher](http://www.php.net/)
* [PHP JSON extension](http://php.net/manual/en/book.json.php)

## Note ##
All the sample code in PHP FOR webmaster tool Api mention examples folder

## 3 Easy step of Installation ##
Step 1
	Download source code
step 2
	Open config.php and Enter client_id and client_secret 
	Example
		'oauth2_client_id' => '<Enter Client ID>',
		'oauth2_client_secret' => '<Enter Client Secret>'
step 3
Open examples directory (Each file provied specified data as mention )
searchanalytics.php
   - Query your data with filters and parameters that you define. Returns zero or more rows grouped by the row keys that you define. You must define a date range of one or more days. When date is one of the group by values, any days without data are omitted from the result list. If you need to know which days have data, issue a broad date range query grouped by date for any metric, and see which day rows are returned.
sites.php
   - Lists the user's Search Console sites.
sitemaps.php 
  - Lists the sitemaps-entries submitted for this site, or included in the sitemap index file (if sitemapIndex is specified in the request).
url_crawl_errors.php 
  - Retrieves details about crawl errors for a site's sample URL.
url_crawl_errors_samples
  - 	Retrieves a time series of the number of URL crawl errors per error category and platform.
		