# Description
The **Checkbox** component allows users to select multiple options from a visible list (not in a dropdown). It's ideal for forms requiring selections like preferences, subscriptions, or multiple applicable answers.

This component is useful when you need users to pick more than one option directly from the form layout.

---

# Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Form/CheckBox/Checkbox_Image_1.png)

---

# Properties

| Name               | Description                                                             | Type              | Example                        |
|--------------------|-------------------------------------------------------------------------|-------------------|--------------------------------|
| Variable mapping   | Maps the selected options to a defined form variable                    | String (Variable) | `userPreferences`              |
| Label              | Display text for each checkbox option                                   | String            | "Email Alerts", "SMS Alerts"   |
| Value              | Internal value for each checkbox option                                 | String            | "email", "sms"                 |
| Variant            | Visual style of the checkbox options                                    | String (choice)   | "Outlined", "Filled"           |
| isReadOnly         | Makes the options read-only (visible but not selectable)                | Choice            | Yes / No                       |
| isDisabled         | Disables the entire component                                            | Choice            | Yes / No                       |
| Size               | Controls the size of the checkbox items                                 | String (choice)   | "Small", "Normal", "Large"     |

---

# Style Options

| Name               | Description                                             | Type    | Example              |
|--------------------|---------------------------------------------------------|---------|----------------------|
| Width              | Width of the checkbox component                         | String  | 100%, 280px          |
| Height             | Height of the checkbox component                        | String  | auto, 50px           |
| Custom CSS class   | A custom class defined in the style editor              | String  | form-checkbox-group  |

---

# Usage Tips

- Use **variable mapping** to capture multiple selections for processing in your workflows.
- Use **isReadOnly** when you want to show pre-selected options without allowing changes.
- **isDisabled** can be useful to lock the entire field during certain form states.
- Adjust **variant** and **size** to match your overall UI style and form layout.
