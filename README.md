# Grid Pagination
Adds pagination capabilities to Grid Fields for ExpressionEngine 7.2 and above. 

## Basic Example

```html
{exp:grid_pagination:field_params
    field_id='4'
    url_title="{segment_3}"
    channel="blog"
    limit="2"
    url_segment="4"
}

{exp:channel:entries url_title="{segment_3}" dynamic="false" limit='1' require_entry='yes'}

    {!-- content output --}
    <h1>{title}</h1>

    {!-- image (GRID) --}
    {if blog_image}
        {blog_image offset="{grid:offset}" limit="{grid:limit}"}
            <figure>
                <img src="{blog_image:image}" alt="{blog_image:caption:attr_safe}">
                <figcaption>{blog_image:caption}</figcaption>
            </figure>
            {blog_image:grid_encryption}
            <p>
                {blog_image:test_grid_datalist:label}
            </p>
        {/blog_image}
        {embed="blog/_grid-pagination"}
    {/if}
{/exp:channel:entries}
{/exp:grid_pagination:field_params}
```

## Considerations

Due to how ExpressionEngine parses templates (and/or my limited understanding of it) there are some key requirements to keep in mind for this Add-on. 

1. Parse order is a thing, so the `grid_pagination:field_params` tag MUST wrap around the `channel:entries` tag and cannot be nested within.
2. Since the `channel:entries` tag can contain its own pagination, you should implement your pagination as an embed. 
3. You have to add 2 parameters to your Grid fields for output `offset` and `limit`

## Requirements

At least PHP >= 8.0 and ExpressionEngine >= 6.4 or >= 7.2

## Tags

### `field_params`

This tag is used to seed the offset and limit values into the Grid tag. 

#### Parameters

`field_id`
This parameter should be the integer value for the specific Grid field you want to paginate data from

`entry_id`
The specific Channel Entry your Grid field resides in

`channel`
The Channel short name to relate to a url_title parameter

`url_title`
The url_title value for the entry you want (requires channel param)

`limit` 
How many Grid items you want per page

`url_segment`
The number the pagination URL segment comes from. (optional, default is 3)

`prefix`
A unique letter to differentiate pagination units. (optional, default is "G")

#### Example
<pre>
{exp:grid_pagination:field_params field_id='FIELD_ID' entry_id="ENTRY_ID" limit="2"}
Channel Entries Tag Here 
{/exp:grid_pagination:field_params}
</pre>

### Pagination

Used to output the pagination links for your Grid field. This tag uses the exact same pagination logic as regular ExpressionEngine pagination. 

#### Parameters

`field_id`
This parameter should be the integer value for the specific Grid field you want to paginate data from

`entry_id`
The specific Channel Entry your Grid field resides in

`channel`
The Channel short name to relate to a url_title parameter

`url_title`
The url_title value for the entry you want (requires channel param)

`limit` 
How many Grid items you want per page

`url_segment`
The number the pagination URL segment comes from. (optional, default is 3)

`prefix`
The string you want to delineate your pagination from others. Defaults to `G` (for Grid)

> Note that this tag uses the native Pagination tooling for ExpressionEngine, so all those paramters and tags work here too

#### Example
```
{exp:grid_pagination:field_params
    field_id='4'
    url_title="{segment_3}"
    channel="blog"
    limit="2"
    url_segment="4"
}
{exp:channel:entries url_title="{segment_3}" dynamic="false" limit='1' require_entry='yes'}

    {!-- content output --}
    <h1>{title}</h1>

    {!-- image (GRID) --}
    {if blog_image}
        {blog_image offset="{grid:offset}" limit="{grid:limit}"}
            <figure>
                <img src="{blog_image:image}" alt="{blog_image:caption:attr_safe}">
                <figcaption>{blog_image:caption}</figcaption>
            </figure>
            {blog_image:grid_encryption}
            <p>
                {blog_image:test_grid_datalist:label}
            </p>
        {/blog_image}
        {embed="blog/_grid-pagination"}
    {/if}
{/exp:channel:entries}
{/exp:grid_pagination:field_params}
```