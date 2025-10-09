<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.styleGlobal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .profile-container {
            position: relative;
            margin: 20px auto;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            position: absolute;
            top: 15px;
            left: 15px;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ddd;
            margin-bottom: 20px;
        }

        .profile-info {
            width: 100%;
        }

        .profile-info th {
            text-align: left;
            padding: 10px 0;
            font-weight: normal;
            color: #555;
        }

        .profile-info td {
            padding: 10px 0;
            font-weight: bold;
            color: #333;
        }

        .saldo-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        .saldo-amount {
            font-size: 1.2em;
            font-weight: bold;
            color: #28a745;
        }

        .btn-topup {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .action-buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn {
            flex: 1;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="profile-container">
                <!-- Tombol Kembali -->
                <a href="/" class="btn btn-secondary back-button">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                <!-- Foto Profil -->
                <div class="text-center profile-photo-container">
                    <?php if($user->profile_photo): ?>
                        <img class="profile-photo" src="<?php echo e(asset('storage/' . $user->profile_photo)); ?>" alt="Profile Photo">
                    <?php else: ?>
                        <img class="profile-photo" src="<?php echo e(asset('assets/images/faces/default.jpg')); ?>" alt="Default Profile Photo">
                    <?php endif; ?>
                </div>

                <!-- Informasi Profil -->
                <table class="profile-info">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td><?php echo e($user->name); ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?php echo e($user->username); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo e($user->email); ?></td>
                    </tr>
                    <tr>
                        <th>Saldo (fitur useless)</th>
                        <td>
                            <div class="saldo-section">
                                <span class="saldo-amount">Rp <?php echo e(number_format($user->saldo, 0, ',', '.')); ?></span>
                                <div class="btn-topup">
                                    <a href="<?php echo e(route('topup')); ?>" class="btn btn-success btn-sm">
                                        <i class="fas fa-plus-circle"></i> Top Up
                                    </a>
                                    <a href="<?php echo e(route('transaksi')); ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-history"></i> Riwayat
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>

                <!-- Tombol Aksi -->
                <div class="action-buttons">
                    <a href="<?php echo e(route('profile.edit', $user->id_user)); ?>" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit Profil
                    </a>
                    
                    <a href="/reservations/view" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Detail Reservasi
                    </a>


                    <?php if(Auth::user()->id_role == '3'): ?>
                        <a href="<?php echo e(route('pihakgym.edit', $user->id_user)); ?>" class="btn btn-primary">
                            <i class="fas fa-building"></i> Edit Profil Gym
                        </a>
                        <a href="<?php echo e(route('pihakgym.view')); ?>" class="btn btn-primary">
                            <i class="fas fa-building"></i> List Reservasi
                        </a>
                    <?php elseif(Auth::user()->id_role == '1'): ?>
                        <a href="<?php echo e(route('request.gym')); ?>" class="btn btn-primary">
                            <i class="fas fa-building"></i> Buat Gym
                        </a>
                    <?php elseif(Auth::user()->id_role == '2'): ?>
                        <a href="<?php echo e(route('admin.index')); ?>" class="btn btn-primary">
                            <i class="fas fa-building"></i> Dashboard
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('partials.jspage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.jsglobal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\GYMLOC.Reservavation_Gym-master\resources\views/profile/index.blade.php ENDPATH**/ ?>