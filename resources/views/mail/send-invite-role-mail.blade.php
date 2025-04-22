<div style="font-family: Arial, sans-serif; line-height: 1.6;">
    <!-- We must ship. - Taylor Otwell -->
    <p>Hello {{$username}},</p>

    <p>We’re excited to invite you to join the <strong>{{$communityName}}</strong> as a <strong>{{$role}}</strong>.</p>

    <p>Your experience and passion for development make you a perfect fit for this role. As a {{$role}}, you'll help us foster a respectful, engaging, and collaborative environment for all members.</p>

    <p>Please click the link below to confirm your invitation and activate your {{$role}} privileges:</p>

    <p>
        <a href="http://127.0.0.1:9999/ManageCommunity/CheckInvitation/{{$CommunityID}}/{{$userID}}/{{$role}}" style="background-color:#4CAF50; color:white; padding:10px 20px; text-decoration:none; border-radius:5px;">
            Confirm Invitation
        </a>
    </p>

    <p>Thank you for being a part of our growing community!</p>

    <p>Best regards,<br> {{$communityName}} Community Team</p>
</div>
