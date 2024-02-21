# Glossary
==============================================================

In the constants.typoscript file there is a "plugin.tx_glossary.itemsDetailsPid" and a "plugin.tx_glossary.itemsStoragePid" definitions that need to be set in a file or in the backend template (in the constants textarea in the "Template" module).
Each constant will be used in more than one place so it's a good idea to have them set. (I said "is a good idea", because some times it's necessary and sometimes is a performance improvement)
Typoscript constants are used for Frontend purposes.
In this case, this two are used at least for defining the record links that will be used in the "Glossary" tab in the link browser in order to link any Glossary Item from anywhere where you can add links in Typo3. And for the links constructed in the sitemap.xml file.
In this extension, we don't have to do any "extension configuration" in the Settings module in the backend. (this settings are used for backend purposes).

This extension holds two plugins:

Itemslist - For rendering an overview of all the glossary items from a particular system storage folder.
* In this plugin you just need to define (in the backend in the plugin record) the Pid of the page is the detail plugin and the Pid of the system storage from where you want to list the Item records.

Itemsdetail - For rendering the detailed view of each of this items.
* In this plugin you can (by a default feature from Typo3, but is not necessary) the storage pid of the Items records.