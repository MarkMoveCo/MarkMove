<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('/css/user/profile.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(Auth::user()->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="fb-profile">
        <a href="#" class="profile-picture">
            <img align="left" class="fb-image-lg" alt="Profile image example"/>
        </a>
        <a href="#" class="profile-picture">
            <img align="left" class="fb-image-profile thumbnail"/>
        </a>

        <!-- 							<form action="" method="post" enctype="multipart/form-data">
                                        Select image to upload:
                                           <input type="file" name="fileToUpload" id="fileToUpload">
                                        <input type="submit" value="Upload Image" name="upload_profile_picture">
                                    </form> -->

        <div class="profile-menu">
            <ul>
                <li><a href="#">Photos</a></li>
                <li><a href="#">Videos</a></li>
                <li><a href="#">Activities</a></li>
                <li><a href="#">Groups</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Friends</a></li>
            </ul>
            <div class="change-picture">
                <a th:href="@{/users/profile/edit}" role="button">
                    <i class="fa fa-edit"></i>
                    <span id="change-text">Change picture</span>
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="sidebar">
            <div class="profile">
                <div class="profile-name" th:text="${user.username}">
                </div>
                <div>
                    <table class="profile-info">
                        <tr>
                            <td><i class="fa fa-pencil-square"></i></td>
                            <td>Write something about you...</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-home"></i></td>
                            <td>Born from a boom-box</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="newsfeed">
            <div class="add-post panel">
                <div class="general">
                    <div class="post-element user">
                        <a href="#" class="profile-picture">
                            <img class="profile-picture" align="left"/>
                        </a>
                    </div>
                    <div class="post-element">
                        <textarea class="post-content" placeholder="What do you want to say?" required="required"></textarea>
                    </div>
                </div>

                <div class="sufix">
                    <div class="post-element icons">
                        <a href="#">
                            <i class="fa fa-image">Add picture</i>
                        </a>
                        <a href="#">
                            <i class="fa fa-map-marker">Add Location</i>
                        </a>
                    </div>
                    <div class="post-element action">
                        <input class="commit btn" name="commit" type="submit" value="Post"/>
                    </div>
                </div>
            </div> <!-- add-post  -->

            <div class="feed panel">
                <div class="post-element user">
                    <a href="#" class="post-element">
                        <img class="profile-picture" align="left"/>
                    </a>
                    <div class="post-element">
                        <a href="#">
                            <h4 class="name">Pesho Petrov</h4>
                        </a>
                        <p>from 12:37 17.11.1721 at <a href="#">Moscow, Russia</a></p>
                    </div>
                </div>

                <div>
                    <div>
                        <p class="text">Kaji neshto tuk! <br/>oK!</p>
                    </div>
                    <div class="photo-box">
                        <a href="#">
                            <img class="photo" src="http://i.dailymail.co.uk/i/pix/2015/09/28/08/2CD1E26200000578-0-image-a-312_1443424459664.jpg"/>
                        </a>
                    </div>
                </div>

                <div class="stats">
                    <a href="#"><span class="likes">25 likes</span></a>

                    <a href="#"><span class="shares">0 shares</span></a>
                    <a href="#"><span class="comments">1 comment</span></a>
                </div>

                <div class="actions">
                    <button class="post-element btn">
                        <i class="fa fa-thumbs-o-up"></i>
                        Like
                    </button>

                    <button class="post-element btn">
                        <i class="fa fa-comments-o"></i>
                        Comment
                    </button>

                    <button class="post-element btn">
                        <i class="fa fa-share"></i>
                        Share
                    </button>
                </div>

                <div class="comment-action">
                    <div class="general">
                        <div class="post-element user">
                            <a href="#">
                                <img class="profile-picture" align="left" />
                            </a>
                        </div>

                        <div class="post-element">
                            <textarea class="post-content" placeholder="What do you want to say?"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- newsfeed -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>