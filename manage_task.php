<?php 
include 'db_connect.php';
if(!isset($_SESSION)) { session_start(); }

// Check if user is logged in
if(!isset($_SESSION['login_id'])){
    echo "<script>window.location.href='login.php';</script>";
    exit;
}

// Check if project ID is provided
if(!isset($_GET['pid'])){
    echo "<script>alert('Project ID is required'); window.location.href='index.php?page=project_list';</script>";
    exit;
}

// Process form submission
if(isset($_POST['submit'])){
    $task = mysqli_real_escape_string($conn, $_POST['task']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = $_POST['status'];
    $project_id = $_GET['pid']; // Get project ID from URL
    
    // Check if it's an update or new task
    if(empty($_POST['id'])){
        $sql = "INSERT INTO task_list (project_id, task, description, status, date_created) 
                VALUES ('$project_id', '$task', '$description', '$status', NOW())";
                
        if($conn->query($sql)){
            echo "<script>
                alert('Task successfully created');
                window.location.href='index.php?page=view_project&id=$project_id';
            </script>";
            exit;
        } else {
            $error = "Error creating task: " . $conn->error;
        }
    } else {
        $id = $_POST['id'];
        $sql = "UPDATE task_list SET 
                task = '$task',
                description = '$description',
                status = '$status'
                WHERE id = '$id'";
                
        if($conn->query($sql)){
            echo "<script>
                alert('Task successfully updated');
                window.location.href='index.php?page=view_project&id=$project_id';
            </script>";
            exit;
        } else {
            $error = "Error updating task: " . $conn->error;
        }
    }
}

// Get existing task data if editing
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM task_list where id = ".$_GET['id'])->fetch_array();
    foreach($qry as $k => $v){
        $$k = $v;
    }
}
?>

<div class="container-fluid">
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        
        <div class="form-group">
            <label for="">Task Name</label>
            <input type="text" class="form-control form-control-sm" name="task" value="<?php echo isset($task) ? $task : '' ?>" required>
        </div>
        
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control" rows="4" required><?php echo isset($description) ? $description : '' ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="status" class="custom-select custom-select-sm" required>
                <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Pending</option>
                <option value="2" <?php echo isset($status) && $status == 2 ? 'selected' : '' ?>>On-Progress</option>
                <option value="3" <?php echo isset($status) && $status == 3 ? 'selected' : '' ?>>Done</option>
            </select>
        </div>

        <div class="card-footer border-top border-info">
            <div class="d-flex w-100 justify-content-center align-items-center">
                <button type="submit" name="submit" class="btn btn-flat bg-gradient-primary mx-2">Save</button>
                <a class="btn btn-flat bg-gradient-secondary mx-2" href="index.php?page=view_project&id=<?php echo $_GET['pid']; ?>">Cancel</a>
            </div>
        </div>
    </form>
</div>