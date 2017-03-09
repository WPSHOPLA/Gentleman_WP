<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Lightbox</label>
            <select name="lightbox" id="lightbox">
                <option value=""></option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="input">
            <label>Order By</label>
            <select name="order_by" id="order_by">
                <option value="menu_order">Order</option>
                <option value="title">Title</option>
                <option value="date">Date</option>
            </select>
        </div>
        <div class="input">
            <label>Order</label>
            <select name="order" id="order">
                <option value="ASC">ASC</option>
                <option value="DESC">DESC</option>
            </select>
        </div>
        <div class="input">
            <label>Number of portolios on page (-1 is all)</label>
            <input name="number" id="number" value="" size="5" />
        </div>
        <div class="input">
            <label>Category Slug (leave empty for all)</label>
            <input name="category" id="category" value="" size="5" />
        </div>
        <div class="input">
            <label>Selected Projects (leave empty for all, delimit by comma)</label>
            <input name="selected_projects" id="selected_projects" value="" size="40" />
        </div>
        <div class="input">
            <label>Title Tag</label>
            <select name="title_tag" id="title_tag">
                <option value=""></option>
                <option value="h2">h2</option>
                <option value="h3">h3</option>
                <option value="h4">h4</option>
                <option value="h5">h5</option>
                <option value="h6">h6</option>
            </select>
        </div>
        <div class="input">
            <label>Image size</label>
            <select name="image_size" id="image_size">
                <option value="">Original Size</option>
                <option value="square">Square</option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>

    </form>
</div>