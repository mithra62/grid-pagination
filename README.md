# Grid Pagination
Adds pagination capabilities to Grid Fields for ExpressionEngine 7.2 and above. 

## Basic Example

```html
{exp:grid_pagination:field_params field_id='FIELD_ID' entry_id="ENTRY_ID" limit="2"}
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

#### Params

`field_id`
This parameter should be the integer value for the specific Grid field you want to paginate data from

`entry_id`
The specific Channel Entry your Grid field resides in

`limit` 
How many Grid items you want per page

