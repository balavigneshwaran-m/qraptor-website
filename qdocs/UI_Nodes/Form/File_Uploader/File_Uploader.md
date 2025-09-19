# Description
The **FileUploader** component is used for uploading and capturing file content within a form. It is especially useful in scenarios like uploading resumes, documents, or other attachments as part of a submission process.

This component integrates with global storage configurations and supports advanced upload options including file size restrictions and format filtering.

---

# Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Form/File_Uploader/File_Uploader_Image_1.png)

---

# Properties

| Name                    | Description                                                                 | Type               | Example                               |
|-------------------------|-----------------------------------------------------------------------------|--------------------|---------------------------------------|
| Configuration           | Global Configuration of type **Dms Upload** where files will be stored        | String (Required)  | "Resume Upload Config"                |
| Variable mapping        | Maps the uploaded file reference to a defined form variable                 | String (Variable)  | `userResume`                          |
| Upload Mode Selection   | Allows choosing between single or multiple file uploads                     | Choice Radio Buttons| "Single File", "Multiple File"        |
| Selected Allowed Formats| File formats allowed for upload; if none selected, all formats are allowed | List               | "pdf", "docx", "jpg"                  |
| Disable Upload          | Disables the file upload field                                              | Choice             | Yes / No                              |
| Restrict File Size      | Maximum file size allowed in bytes                                          | Number             | 1048576 (for 1 MB)                    |
| Custom Drop Area Message| Text message displayed in the file upload area                              | String             | "Drop your resume here or click to upload" |

---

# Style Options

| Name               | Description                                             | Type    | Example               |
|--------------------|---------------------------------------------------------|---------|-----------------------|
| Width              | Width of the file uploader component                    | String  | 100%, 400px           |
| Height             | Height of the file uploader component                   | String  | auto, 120px           |
| Color   | The Border color of the upload area                     | String  | #f5f5f5, #ffffff      |
| Custom CSS class   | A custom class defined in the style editor              | String  | resume-upload-widget  |

---

# Usage Tips

- **Configuration** must be set up correctly in Global Configurations under type **Dms Upload** for successful file storage.
- Use **Upload Mode Selection** to decide whether to allow one or multiple file uploads.
- Define **Selected Allowed Formats** to limit uploads to specific file types.
- Use **Restrict File Size** to prevent overly large files from being uploaded; size is in **bytes**.
- Customize the **drop area message** to provide helpful instructions or branding.
- Combine with variable mapping to use   uploaded content in workflows or logic.
