# Grid Pagination
Adds pagination capabilities to Grid Fields for ExpressionEngine 7.2 and above. 

## Basic Example

```html
{exp:grid_pagination:field_params field_id='FIELD_ID'url_title="{segment_3}" channel_id="CHANNEL_ID" limit="2"}
    {exp:channel:entries entry_id="ENTRY_ID" channel="CHANNEL_NAME"}
        {test_grid_field offset="{grid:offset}" limit="{grid:limit}"}
            {GRID_FIELD_NAME:GRID_COLUMN_NAME} <br />
        {/test_grid_field}
        {embed="embeds/_grid-pagination"}

    {/exp:channel:entries}
{/exp:grid_pagination:field_params}
```

## Considerations

Due to how ExpressionEngine parses templates (and/or my limited understanding of it) there are some key requirements to keep in mind for this Add-on. 

1. Parse order is a thing, so the `grid_pagination:field_params` tag MUST wrap around the `channel:entries` tag and cannot be nested within.
2. Since the `channel:entries` tag can contain its own pagination, you should implement your pagination as an embed. 
3. You have to add 2 parameters to your Grid fields for output `offset` and `limit`

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

#### Example
```html
{exp:grid_pagination:field_params field_id='FIELD_ID' entry_id="ENTRY_ID" limit="2"}
<!-- Channel Entries Tag Here -->
{/exp:grid_pagination:field_params}
```

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

`prefix`
The string you want to delineate your pagination from others. Defaults to `G` (for Grid)

#### Example
```html
{exp:grid_pagination:pagination field_id='FIELD_ID' entry_id="ENTRY_ID" limit="2"}
{paginate}
{pagination_links}
<ul>
  {first_page}
  <li><a href="{pagination_url}" class="page-first">First Page</a></li>
  {/first_page}

  {previous_page}
  <li><a href="{pagination_url}" class="page-previous">Previous Page</a></li>
  {/previous_page}

  {page}
  <li><a href="{pagination_url}" class="page-{pagination_page_number} {if current_page}active{/if}">{pagination_page_number}</a></li>
  {/page}

  {next_page}
  <li><a href="{pagination_url}" class="page-next">Next Page</a></li>
  {/next_page}

  {last_page}
  <li><a href="{pagination_url}" class="page-last">Last Page</a></li>
  {/last_page}
</ul>
{/pagination_links}
{/paginate}
{/exp:grid_pagination:pagination}
```