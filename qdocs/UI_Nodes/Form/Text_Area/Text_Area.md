# Description
The **Text Area** component allows users to input multi-line text, making it ideal for comments, feedback forms, descriptions, or any content that requires paragraph-style input.

It supports variable binding , customization of styles, and disabled states for read-only configurations.

---

# Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Form/Text_Area/Text_Area_Image_1.png)

---

# Properties

| Name               | Description                                                          | Type               | Example             |
|--------------------|----------------------------------------------------------------------|--------------------|---------------------|
| Textarea value     | The variable bound to the textarea input                     | Variable binding   | `userComment`       |
| Textarea label     | The label displayed above or next to the textarea                    | String             | "Your Message"      |
| Is disabled        | Determines whether the textarea is editable                          | Boolean            | true / false        |

---

# Style Options

| Name               | Description                                      | Type    | Example                |
|--------------------|--------------------------------------------------|---------|------------------------|
| Width              | Width of the text area                           | String  | `100%`, `400px`        |
| Height             | Height of the text area                          | String  | `120px`, `auto`        |
| Color              | Text color inside the text area                  | String  | `#444444`              |
| Custom CSS class   | A custom class name defined in the style editor  | String  | `custom-textarea-box`  |

---

# Usage Tips

- Use **textarea value** to bind user input to a reactive variable in your logic.
- Apply **is disabled** for scenarios like viewing previously submitted content.
- Adjust **height** to allow for multiple lines of text entry as needed.
- Use a **custom CSS class** to add padding, border, focus effects, or adjust line spacing.
