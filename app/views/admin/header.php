<!-- Admin header partial -->
<div class="row header shadow-sm align-items-center">
    <!--Logo-->
    <div class="col-sm-3 pl-0 text-center header-logo">
        <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
            <h3 class="logo"><a href="#" class="text-secondary logo"><i class="fa fa-rocket"></i> Trang quản lý</a></h3>
        </div>
    </div>
    <!--Logo-->

    <!--Header Menu-->
    <div class="col-sm-9 header-menu">
        <div class="row align-items-center">
            <!--Menu Icons-->
            <div class="col-sm-8 col-6 pl-0">
                <!--Toggle sidebar-->
                <span class="menu-icon" onclick="toggle_sidebar()">
                    <span id="sidebar-toggle-btn"></span>
                </span>
                <!--Toggle sidebar-->
                <!--Notification icon-->
                <div class="menu-icon">
                    <a class="" href="#" id="notificationDropdown" onclick="toggle_dropdown(this); return false"
                        role="button" class="dropdown-toggle">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-danger" id="notify-badge" style="display:none;">0</span>
                    </a>
                    <div class="dropdown dropdown-left bg-white shadow border p-0" style="width: 320px;">
                        <div
                            class="dropdown-header bg-light d-flex justify-content-between align-items-center py-2 px-3">
                            <strong class="text-uppercase small">Thông báo mới</strong>
                            <a href="javascript:void(0)" onclick="markAllAsRead()" class="text-primary small">Đánh dấu
                                đã đọc</a>
                        </div>
                        <div class="dropdown-divider m-0"></div>
                        <div id="notification-list" style="max-height: 350px; overflow-y: auto;">
                            <div class="text-center p-4 text-muted small" id="no-notify">
                                <i class="fa fa-bell-slash-o fa-2x mb-2 d-block"></i>
                                Chưa có thông báo
                            </div>
                        </div>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item text-center py-2 link-all font-weight-bold text-primary small"
                            href="/php-duhoc/public/admin/consultations">
                            XEM TẤT CẢ TƯ VẤN <i class="fa fa-angle-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <!--Notication icon-->
            </div>
            <!--Menu Icons-->

            <!--Logout button-->
            <div class="col-sm-4 col-6 text-right pr-3">
                <a class="btn btn-outline-danger btn-sm" href="<?= $base ?>/admin/logout">
                    <i class="fa fa-power-off"></i> Đăng xuất
                </a>
            </div>
            <!--Logout button-->
        </div>
    </div>
    <!--Header Menu-->
</div>

<!-- Notification Popup Modal -->
<div id="notificationModal" class="modal fade" tabindex="-1" role="dialog" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fa fa-bell mr-2"></i> Đăng ký tư vấn mới!</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="notificationModalBody"></div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Đóng</button>
                <a href="/php-duhoc/public/admin/consultations" class="btn btn-success btn-sm">Xem chi tiết</a>
            </div>
        </div>
    </div>
</div>

<style>
/* Notification Styles */
#notification-list .notification-item {
    transition: all 0.2s;
    border-bottom: 1px solid #eee;
}

#notification-list .notification-item:last-child {
    border-bottom: none;
}

#notification-list .notification-item.unread {
    background-color: #f0f7ff;
}

#notification-list .notification-item:hover {
    background-color: #f8f9fa;
}

#notification-list .dropdown-item {
    white-space: normal;
    padding: 12px 15px;
}

.notify-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.bg-success-light {
    background-color: #e8f5e9;
    color: #28a745;
}

.text-success {
    color: #28a745 !important;
}

.notification-pulse {
    animation: pulse 2s infinite;
    border: 4px solid #fff;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
    }

    70% {
        box-shadow: 0 0 0 10px rgba(40, 167, 69, 0);
    }

    100% {
        box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
    }
}
</style>

<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-database.js"></script>
<script src="/assets/js/firebase-config.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof firebase === 'undefined') return;

    const db = firebase.database();
    const notifyList = document.getElementById('notification-list');
    const badge = document.getElementById('notify-badge');
    const noNotifyMsg = document.getElementById('no-notify');
    let unreadKeys = [];

    function addNotificationToDom(data, timestamp, key, isRead, isPrepend = true) {
        if (noNotifyMsg) noNotifyMsg.style.display = 'none';

        const dateObj = new Date(timestamp);
        const timeStr =
            dateObj.getDate().toString().padStart(2, '0') + '/' +
            (dateObj.getMonth() + 1).toString().padStart(2, '0') + '/' +
            dateObj.getFullYear() + ' ' +
            dateObj.getHours().toString().padStart(2, '0') + ':' +
            dateObj.getMinutes().toString().padStart(2, '0');

        const html = `
            <div class="notification-item ${isRead ? 'read' : 'unread'}" data-key="${key}">
                <a href="/php-duhoc/public/admin/consultations" class="dropdown-item" onclick="markAsRead('${key}')">
                    <div class="media align-items-center">
                        <div class="mr-3">
                            <div class="rounded-circle notify-icon ${isRead ? 'bg-light text-muted' : 'bg-success-light'}">
                                <i class="fa ${isRead ? 'fa-envelope-open-o' : 'fa-envelope'}"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h6 class="mt-0 mb-1 font-weight-bold ${isRead ? 'text-muted' : 'text-dark'}" style="font-size: 14px;">${escapeHtml(data.name)}</h6>
                            <div class="text-muted small mb-1"><i class="fa fa-phone mr-1"></i>${escapeHtml(data.phone)}</div>
                            <div class="d-flex justify-content-between align-items-center"
                                <small class="text-muted"><i class="fa fa-clock-o mr-1"></i>${timeStr}</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        `;

        if (isPrepend) notifyList.insertAdjacentHTML('afterbegin', html);
        else notifyList.insertAdjacentHTML('beforeend', html);

        if (!isRead && !unreadKeys.includes(key)) unreadKeys.push(key);
    }

    function updateBadgeCount() {
        db.ref('notifications').orderByChild('read').equalTo(false).once('value', snapshot => {
            const count = snapshot.numChildren();
            if (count > 0) {
                badge.innerText = count > 99 ? '99+' : count;
                badge.style.display = 'inline-block';
            } else {
                badge.style.display = 'none';
            }
        });
    }

    window.markAsRead = function(key) {
        db.ref('notifications/' + key).update({
            read: true
        }).then(() => {
            const item = document.querySelector(`[data-key="${key}"]`);
            if (item) {
                item.classList.remove('unread');
                item.classList.add('read');
            }
            updateBadgeCount();
        });
    };

    window.markAllAsRead = function() {
        if (unreadKeys.length === 0) return;
        const updates = {};
        unreadKeys.forEach(key => updates[`/notifications/${key}/read`] = true);
        db.ref().update(updates).then(() => {
            unreadKeys = [];
            updateBadgeCount();
            document.querySelectorAll('.notification-item.unread').forEach(el => {
                el.classList.remove('unread');
                el.classList.add('read');
            });
        });
    };

    function escapeHtml(text) {
        if (!text) return '';
        return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
    }

    function showNotificationPopup(data, timestamp) {
        const modalBody = document.getElementById('notificationModalBody');
        modalBody.innerHTML = `
            <div class="text-center mb-3">
                <div class="rounded-circle bg-success d-inline-flex align-items-center justify-content-center notification-pulse" style="width: 70px; height: 70px;">
                    <i class="fa fa-user-plus text-white" style="font-size: 30px;"></i>
                </div>
            </div>
            <div class="p-3 border rounded bg-light">
                <p class="mb-2"><strong>Khách hàng:</strong> ${escapeHtml(data.name)}</p>
                <p class="mb-2"><strong>Điện thoại:</strong> ${escapeHtml(data.phone)}</p>
                <p class="mb-0"><strong>Nội dung:</strong> ${escapeHtml(data.message || 'Cần tư vấn du học')}</p>
            </div>
        `;
        $('#notificationModal').modal('show');
    }

    // 1. Load History
    db.ref('notifications').orderByChild('timestamp').limitToLast(10).once('value', snapshot => {
        const items = [];
        snapshot.forEach(child => {
            items.push({
                ...child.val(),
                key: child.key
            });
        });
        if (items.length > 0) {
            items.reverse().forEach(item => addNotificationToDom(item.data, item.timestamp, item.key,
                item.read === true, false));
            updateBadgeCount();
        }
    });

    // 2. Listen Realtime
    const now = Date.now();
    db.ref('notifications').orderByChild('timestamp').startAt(now).on('child_added', function(snapshot) {
        const msg = snapshot.val();
        if (document.querySelector(`[data-key="${snapshot.key}"]`)) return;
        if (msg && msg.type === 'new_consultation') {
            if (!window.isConsultationPage) showNotificationPopup(msg.data, msg.timestamp);
            addNotificationToDom(msg.data, msg.timestamp, snapshot.key, false, true);
            updateBadgeCount();
        }
    });

    // Auto mark all as read if on consultation page
    if (window.isConsultationPage) {
        setTimeout(markAllAsRead, 2000);
    }
});
</script>