// Görev Yönetim Sistemi
const taskInput = document.getElementById('taskInput');
const addTaskButton = document.getElementById('addTaskButton');
const taskList = document.getElementById('taskList');

// Görev Ekleme Fonksiyonu
function addTask() {
    const taskText = taskInput.value.trim();
    if (taskText === '') {
        alert('Lütfen bir görev girin!');
        return;
    }

    const taskItem = document.createElement('li');
    taskItem.className = 'task-item';

    // Görev metni
    const taskTextSpan = document.createElement('span');
    taskTextSpan.className = 'task-text';
    taskTextSpan.textContent = taskText;

    // Tamamla Butonu
    const completeButton = document.createElement('button');
    completeButton.textContent = 'Tamamla';
    completeButton.className = 'complete-btn';
    completeButton.addEventListener('click', () => markTaskComplete(taskItem));

    // Sil Butonu
    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Sil';
    deleteButton.className = 'delete-btn';
    deleteButton.addEventListener('click', () => deleteTask(taskItem));

    // Görevi listeye ekle
    taskItem.appendChild(taskTextSpan);
    taskItem.appendChild(completeButton);
    taskItem.appendChild(deleteButton);
    taskList.appendChild(taskItem);

    // Giriş alanını temizle
    taskInput.value = '';
}

// Görevi Tamamla
function markTaskComplete(taskItem) {
    const taskText = taskItem.querySelector('.task-text');
    taskText.style.textDecoration = 'line-through';
    taskText.style.color = 'gray';
}

// Görevi Sil
function deleteTask(taskItem) {
    taskList.removeChild(taskItem);
}

// Buton Tıklama Olayları
addTaskButton.addEventListener('click', addTask);
taskInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') addTask();
});

// Basit Görevler
const sampleTasks = ['JavaScript öğren', '10 sayfa kitap oku', '30 dakika egzersiz yap'];
sampleTasks.forEach(task => {
    taskInput.value = task;
    addTask();
});

// CSS ile Basit Görsellik
const style = document.createElement('style');
style.textContent = `
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    #taskInput {
        width: 300px;
        padding: 10px;
        margin-right: 10px;
    }
    #addTaskButton {
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
    }
    #taskList {
        margin-top: 20px;
        list-style-type: none;
        padding: 0;
    }
    .task-item {
        padding: 10px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .task-item .task-text {
        flex: 1;
    }
    .complete-btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-right: 5px;
    }
    .delete-btn {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }
`;
document.head.appendChild(style); 

// Başlangıç HTML Yapısı
const body = document.body;
body.innerHTML = `
    <h1>Görev Yönetim Sistemi</h1>
    <div>
        <input type="text" id="taskInput" placeholder="Yeni görev girin..." />
        <button id="addTaskButton">Ekle</button>
    </div>
    <ul id="taskList"></ul>
`;
