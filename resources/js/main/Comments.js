import Toaster from "../Events/Toaster";


export function SendComment(){
    $("#sentThisComment").on("click",()=>{
        document.getElementById("LoadingOne").classList.remove("hidden")
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let comment = $("#commentContent")[0].value
        let postId = $("#post_id")[0].value
        $.ajax({
            url : `../../../Comment/Share/${postId}`,
            method:"POST",
            data:{
                comment:comment,
                _token:csrfToken
            },
            success:(response)=>{
                (new Toaster()).show(response.message,"success")
                document.getElementById("comments_area").innerHTML += `
                    <div class="flex space-x-2 px-3 py-3 hover:bg-gray-50 transition-colors">
                        <div class="flex flex-col items-center space-y-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden bg-red-100 flex-shrink-0">
                                <div class="w-full h-full flex items-center justify-center text-red-500 font-bold text-xs">C</div>
                            </div>

                        </div>
                        <div class="flex-1">
                            <div class="flex items-center flex-wrap gap-1.5 mb-1">
                                <span class="font-medium text-gray-900">user name</span>
                                <span class="text-xs text-gray-500"> • just now</span>
                            </div>
                            <p class="text-gray-800 mb-2">${comment}</p>
                        </div>
                    </div>
                `
                document.getElementById("LoadingOne").classList.add("hidden")
            },
            error:(error)=>{
                (new Toaster()).show(error.responseJSON.message,"error")
                document.getElementById("LoadingOne").classList.add("hidden")
            }
        })
    })
}
export function DeleteMyComment(){
    let buttonsDeleteComment = document.querySelectorAll('.deleteMyComment');
    buttonsDeleteComment.forEach((button)=>{
        button.addEventListener('click',()=>{
            document.getElementById("LoadingOne").classList.remove("hidden")
            let commentID = button.id
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            $.ajax({
                url : `/Comment/Delete/${commentID}`,
                method:"DELETE",
                data :{
                    _token:csrfToken

                },
                success:(response)=>{
                    (new Toaster()).show(response.message,"success")
                    document.getElementById("LoadingOne").classList.add("hidden")
                    document.getElementById(commentID).remove()
                },
                error:(error)=>{
                    (new Toaster()).show(error.responseJSON.message,"error")
                    document.getElementById("LoadingOne").classList.add("hidden")
                }
            });
        })
    })
}
