# Description
The **PDF Viewer** component enables users to display and read `.pdf` files directly within the application interface. It provides an inline preview experience, allowing users to assign a PDF file and view its contents with a simple interaction.

This component is ideal for showcasing documents, reports, manuals, or any content typically distributed in PDF format.

---

## Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Document/Pdf_Viewer/Pdf_Viewer_Image_1.png)

---

# Properties

| Name              | Description                                                  | Type   | Example          |
|-------------------|--------------------------------------------------------------|--------|------------------|
| PDF header        | Header or title displayed above the PDF view                 | String | "User Manual"    |
| Select PDF file   | Upload or assign the PDF file to be displayed                | String   | (fileId)     |

---

# Style Options

| Name                  | Description                                           | Type    | Example              |
|-----------------------|-------------------------------------------------------|---------|----------------------|
| Width                 | Width of the viewer container                         | String  | `100%`, `800px`      |
| Height                | Height of the viewer area                             | String  | `500px`, `auto`      |
| Background color      | Background color of the main viewer area              | String  | `#FFFFFF`            |
| Header background     | Background color for the header/title section         | String  | `#F1F1F1`            |
| Border radius         | Corner rounding for the viewer component              | String  | `6px`                |
| Custom CSS class      | Custom CSS class name for advanced styling overrides  | String  | `pdf-theme-rounded`  |

---

# Behavior

- The PDF is **not displayed immediately**. Users must click the **"View Content"** button to render the PDF in the viewer.
- Only `.pdf` file types are supported.
- The viewer provides scrollable access to all pages in the PDF, depending on the layout.

---

# Usage Tips

- Use the **PDF header** to indicate the document’s purpose or category (e.g., "Terms and Conditions", "Annual Report").
- Apply a **custom CSS class** to adjust the viewer’s padding, shadows, or scroll behavior if needed.
- Ensure the uploaded PDF is optimized for web.
