# **Credit : Mamat Dan Wan**

# 🔧 Troubleshooting Guide: Database Connection Issues

## 🚨 Issue 1: Incompatible Driver Version (32-bit vs 64-bit)
![Screenshot illustrating driver error](image-1.png)

### 📌 Root Cause
> This error **occurs when using a driver version (32-bit or 64-bit) that does not match your project or system architecture.**

### ⚠️ Important Pre-Check
> **Before proceeding, check if other compatible driver versions are available for your system.**

---

### 🛠️ Resolution Steps

#### **Step 1: Install the Correct Driver**
Download and install the Microsoft Access Database Engine:
→ **[Download Microsoft Access Database Engine](https://www.microsoft.com/en-us/download/details.aspx?id=54920)**

#### **Step 2: Configure Visual Studio Project for 64-bit**
Set your project's target platform to x64.

```vb
1.  Open your Visual Basic Project.
2.  In **Solution Explorer**, double-click **"My Project"**.
3.  Navigate to the **Compile** section (left sidebar).
4.  Find **"Target CPU"** and select **x64**.
5.  Save your project (Ctrl + S).
```

#### **Step 3: Select the Proper Driver in Your Project**
Within your open project, configure the database connection to use the correct OLE DB provider.

```vb
1.  Click **View** in the top menu bar.
2.  Find and open **"Server Explorer"** or **"Data Sources"**.
3.  Open the **"Add Connection"** wizard.
4.  Click the **"Advanced..."** button.
5.  Under the **"Source"** settings, select the provider:
    → **Microsoft.ACE.OLEDB.XX.X** (Choose the version matching your install)
```

#### **Step 4: Save the Connection**
Save your project to apply the new connection settings.

---

## 🧩 Issue 2: Incomplete Dependencies / Package Components
![Screenshot illustrating missing components](image-2.png)

### 🛠️ Resolution Steps

#### **Step 1: Open Visual Studio Installer**
Launch the installer from your Start Menu or applications folder.

#### **Step 2: Modify Your Installation**
Select your version of Visual Studio and click **"Modify"**.

#### **Step 3: Navigate to Components**
In the new window, click the **"Individual Components"** tab at the top.

#### **Step 4: Install Required Components**
Search for and select the following two components:
- ✅ **Data sources for SQL Server support**
- ✅ **Data sources and service references**

#### **Step 5: Apply Changes**
Click the **"Modify"** button to download and install the selected components.

#### **Step 6: Final Verification**
Once installation is complete, restart Visual Studio and run your script again.

---
> **💡 Tip:** Always ensure your project dependencies and system drivers are compatible with your operating system's architecture (32-bit or 64-bit) to prevent these common issues.
```
Selamat Merenung Membuat Penglihatan Biasa (Visual Basic)
