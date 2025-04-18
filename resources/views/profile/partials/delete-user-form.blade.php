<div class="card">
    <div class="card-header" id="delete_account">
        <h3 class="card-title">
            Delete Account
        </h3>
    </div>
    <div class="card-body flex flex-col lg:py-7.5 lg:gap-7.5 gap-3">
        <div class="flex flex-col gap-5">
            <div class="text-2sm text-gray-800">
                We regret to see you leave. Confirm account deletion below. Your data will be permanently removed.
                Thank you for being part of our community.
                Please check our
                <a class="link" href="#">
                    Setup Guidelines
                </a>
                if you still wish to continue.
            </div>
        </div>
        {{--Delete account--}}
        <div class="flex justify-end gap-2.5">
            <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer votre compte ? ');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">
                    Delete Account
                </button>
            </form>
        </div>
    </div>
</div>
