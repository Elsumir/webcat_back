<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<style>
    .employee-list {
        width: 100%;
        border-collapse: collapse;
    }
    .employee-list th, .employee-list td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    
</style>

<table class="employee-list">
    <thead>
        <tr>
            <th>Имя</th>
            <th>Должность</th>
            <th>Стаж (лет)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($arResult as $employee): ?>
            <tr>
                <td><?php echo htmlspecialchars($employee['NAME']); ?></td>
                <td><?php echo htmlspecialchars($employee['POSITION']); ?></td>
                <td><?php echo htmlspecialchars($employee['EXPERIENCE']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>