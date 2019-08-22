# Common - Batch Uploader #

A back-end batch uploader for the CAH family of sites that will create and upload posts from a given .CSV file.


## Usage ##
This is specifically designed to create a bunch of stub posts, in Draft form, for a given list of data and metadata in a CSV file. Right now, the uploader script only supports the Article and Issue custom post types that CAH designed, and expects the data in a particular order:
<details>
    <summary>Article</summary>
    <p>
    * Post title
    * Post content
    * First author's last name
    * First author's first name
    * List of any other authors
    * Magazine issue the article belongs to (if any)
    * Start page
    * End page
    * Purchase URL
    * DOI
    * Post excerpt
    * Abstract
    * Author info
    * Author URL
    * Author of reviewed work (for book reviews)
    * Title of reviewed work (for book reviews)
    * URL of reviewed work (for book reviews)
    * A list of tags (separated by commas)
    </p>
</details>
<details>
    <summary>Issue</summary>
    <p>
    * Issue title
    * Volume number
    * Issue number
    * Title of journal
    * Publication date (_e.g._, "01/01/1970")
    * Cover date (_e.g._, "Winter 1970)
    * Cover image URL
    * Issue theme
    * ISBN
    * ISSN
    * Purchase URL
    </p>
</details>
When activated, the plugin menu can be found under "Tools" in the WordPress dashboard. You must have administrator privileges on the site in question to be able to see/use the plugin.

## How to Make It Go ##
The page is laid out fairly simply. Select the post type you want to upload in bulk (at this time, limited to either "Article" or "Issue"), choose the CSV file you want to upload, then click the "Create Posts" button.

The page will spend time processing—be forewarned: with large upload sets, this could take some time, and many databases have a time limit for how long a given automated connection can be open—then will reload and notify you of the operation's success or failure. If your CSV was laid out according to the schema above, you should have no problems; however, _make sure that you **do not** include a header row_ as the script starts creating posts from the very first row. Also make sure that your CSV includes spaces for all the requested data, even if that data is ```php NULL```, or you may encounter unexpected and/or undesired results.

### TODO ###
In the future, I may adapt this plugin to support any kind of post type, with customizable CSV schemas, so the user can control exactly what data to include, but I have no solid plans to do so just yet.