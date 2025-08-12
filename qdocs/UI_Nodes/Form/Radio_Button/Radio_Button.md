# Description
The **Radio** component allows users to choose a single option from a predefined list. It is ideal for form fields where only one selection is allowed, similar to traditional radio buttons used in surveys or settings.

This component is useful for capturing user preferences or multiple-choice inputs.

---

# Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Form/Radio_Button/Radio_Button_Image_1.png)

---

# Properties

| Name         | Description                                               | Type              | Example                  |
|--------------|-----------------------------------------------------------|-------------------|--------------------------|
| Label        | The text label shown for each option                      | String            | "Payment Method"         |
| Value        | The internal value assigned to an option                  | String            | "credit_card", "paypal"  |
| Variant      | Visual style of the radio options                         | String (choice)   | "Outlined", "Filled"     |
| is readOnly   | Whether the options are read-only (not selectable)        | Boolean           | True / False             |
| is disabled   | Disables the entire component                             | Boolean           | True / False             |
| Size         | Controls the size of the radio buttons                    | String (choice)   | "Small", "Normal", "Large" |

---

# Style Options

| Name               | Description                                             | Type    | Example              |
|--------------------|---------------------------------------------------------|---------|----------------------|
| Width              | Width of the radio component                            | String  | 100%, 300px          |
| Height             | Height of the radio component                           | String  | auto, 60px           |
| Custom CSS class   | A custom class defined in the style editor              | String  | form-radio-group     |

---

# Usage Tips

- Use **isReadOnly** to display selections without allowing changes, useful for view-only modes.
- Use **isDisabled** to completely disable interaction when the field should be inactive.
- Combine **label** and **value** thoughtfully to ensure both clarity for the user and accurate internal mapping.
- Customize **size** and **variant** to match your form's layout and styling.
