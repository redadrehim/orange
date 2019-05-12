## News Aggregation Task
	## login to admin Part BASE URL /public/login
	## Login With UserName redadrehim@gmail.com Password redadrehim@gmail.com
	## Objects
		# Services Examples [Companies,Cars]
		# Categroies Examples [Economy,Business,Steel,Fiat,Ford]
		# Items Refer to News
	## Content gathering techniques 
		# To test the Crowling check the edit for First category Economy you will find resource type Crowling is selected and added test URL to get conttent from
		# To test the RSS check the edit for Secound category Business you will find resource type RSS is selected and added test URL to get RSS feed conttent from
		# To test the Google APIs check the edit for Secound category Business you will find resource type API is selected and added test keyword to get search result conttent using it
	## import news from RSS or API or Crowling
		# From admin panel categories list click import link
		# BASE URL  /public/items/import/1 for Crowling getting content feature
		# BASE URL  /public/items/import/2 for RSS  getting content feature
		# BASE URL  /public/items/import/3 for Google APIs  getting content feature
	## Listing news based on interst
		# I just created an API interface to show the power of search using elastic search engine
		# To check the API link BASE URL /public/api/items?keyword=Category&elastic=true
	## Technolgy Used
	    # PHP laravel 5.8
	    # mysql
	    # Elastic search