# Description
The **Multi Select** component allows users to select more than one option from a dropdown list. It’s ideal for scenarios where multiple values are valid inputs, such as selecting skills, tags, or categories.

This component provides flexibility for multi-choice fields and supports chips, filtering, and customizable styling.

---

# Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Form/Multi_Select/Multi_Select_Image_1.png)

---

# Properties

| Name               | Description                                                             | Type              | Example                        |
|--------------------|-------------------------------------------------------------------------|-------------------|--------------------------------|
| Variable mapping   | Maps the selected options to a defined form variable                    | String (Variable) | `userSkills`                   |
| Placeholder        | Placeholder text shown before any selection                             | String            | "Select skills"                |
| Label              | Display text for each dropdown option                                   | String            | "JavaScript", "Python"         |
| Value              | Internal value for each dropdown option                                 | String            | "js", "py"                     |
| Display Chip       | Selected options will be shown as chips in the input                    | Choice            | Yes / No                       |
| Show filter        | Enables filtering/search through the options                            | Choice            | Yes / No                       |
| Show clear icon    | Displays a clear (X) icon to remove selected options                    | Choice            | Yes / No                       |
| Variant            | Visual style of the dropdown                                            | String (choice)   | "Outlined", "Filled"           |
| isDisabled         | Whether the component is disabled                                       | Choice            | Yes / No                       |
| Size               | Controls the size of the dropdown                                       | String (choice)   | "Small", "Normal", "Large"     |

---

# Style Options

| Name               | Description                                             | Type    | Example              |
|--------------------|---------------------------------------------------------|---------|----------------------|
| Width              | Width of the multi select component                     | String  | 100%, 300px          |
| Height             | Height of the multi select component                    | String  | auto, 60px           |
| Custom CSS class   | A custom class defined in the style editor              | String  | form-multi-select    |

---

# Usage Tips

- Use **Display Chip** to visually represent selected items clearly and cleanly.
- Use **variable mapping** to tie selected values directly into logic or data processing.
- Enable **Show filter** for better usability when there are many options.
- Use **Show clear icon** to let users quickly remove all selected values.
- Align **variant** and **size** to fit your form layout and aesthetic.
