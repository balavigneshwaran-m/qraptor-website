# Description
The **Single Select** component allows users to choose one option from a dropdown list. It’s a flexible, searchable dropdown menu often used in forms for selecting values like countries, departments, or categories.

This component is ideal for single-choice selections with optional filtering and customization.

---

# Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Form/Single_Select/Single_Select_Image_1.png)

---

# Properties

| Name               | Description                                                             | Type              | Example                        |
|--------------------|-------------------------------------------------------------------------|-------------------|--------------------------------|
| Variable mapping   | Maps the selected option to a defined form variable                     | String (Variable) | `userDepartment`               |
| Placeholder        | Placeholder text shown before selection                                 | String            | "Select a department"          |
| Label              | Display text for each dropdown option                                   | String            | "Sales", "Engineering"         |
| Value              | Internal value for each dropdown option                                 | String            | "sales", "engineering"         |
| Show checkmark     | Whether to show a checkmark for the selected item                       | Boolean (choice)  | Yes / No                   |
| Is editable        | Allows typing inside the dropdown for custom or searchable input        | Boolean (choice)  | Yes / No                   |
| Show filter        | Enables filtering/search through the options                            | Boolean (choice)  | Yes / No                    |
| Show clear icon    | Displays a clear (X) icon to remove selected value                      | Boolean (choice)  | Yes / No                   |
| Variant            | Visual style of the dropdown                                            | String (choice)   | "Outlined", "Filled"           |
| isDisabled         | Whether the component is disabled                                       | Boolean           | Yes / No                    |
| Size               | Controls the size of the dropdown                                       | String (choice)   | "Small", "Normal", "Large"     |

---

# Style Options

| Name               | Description                                             | Type    | Example              |
|--------------------|---------------------------------------------------------|---------|----------------------|
| Width              | Width of the single select component                    | String  | 100%, 250px          |
| Height             | Height of the single select component                   | String  | auto, 40px           |
| Custom CSS class   | A custom class defined in the style editor              | String  | form-single-select   |

---

# Usage Tips

- Use **variable mapping** to store the selected value for workflow logic or backend integration.
- Enable **show filter** to make it easier for users to find options in long lists.
- Allow **editable** mode when the dropdown needs to support user-entered values.
- Enable **clear icon** to allow users to deselect an option quickly.
- Customize **variant** and **size** to align with your form’s design language.
