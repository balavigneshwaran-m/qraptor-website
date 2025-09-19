# Description
The **Markdown Viewer** component allows you to display content from a `.md` (Markdown) file in a visually formatted layout. 

## Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Document/Markdown_Viewer/Markdown_Viewer_Image_1.png)

---

# Properties

| Name              | Description                                                                 | Type    | Example                    |
|-------------------|-----------------------------------------------------------------------------|---------|----------------------------|
| Markdown header   | Title or heading to display above the content                               | String  | "Read Me"                  |
| Required icon     | Whether to show a required indicator icon                                   | Boolean | true / false               |
| Select icon       | Icon to display next to the header                                           | String(select)  | Markdown / Markdown Copy, etc         |
| Icon position     | Position of the icon relative to the header                                 | String  | "left" / "right"           |
| Select file       | Upload or assign a `.md` file whose content will be rendered                | String(variable)    | mdContent                |

---

# Style Options

| Name               | Description                                       | Type    | Example           |
|--------------------|---------------------------------------------------|---------|-------------------|
| Width              | Width of the viewer                               | String  | `100%`, `600px`   |
| Height             | Height of the viewer                              | String  | `400px`           |
| Background color   | Background color of the viewer                    | String  | `#f9f9f9`         |
| Header background  | Background color for the header/title section     | String  | `#e0e0e0`         |
| Border radius      | Border rounding for the component                 | String  | `8px`             |
| Custom CSS class   | A custom CSS class defined in the style editor    | String  | `my-markdown-style`|

---

## Usage Tips
- Use the **Custom CSS class** to apply styles.
- Make sure the uploaded file has valid Markdown syntax to render correctly.
- Icons can enhance the visual appeal of headers, especially when paired with branding or usage context.
