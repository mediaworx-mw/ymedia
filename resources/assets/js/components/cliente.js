const Cliente = () => {
  const $video = document.querySelector('.video-cliente');
  const $play = document.querySelector ('.cliente-top__play');

  const playVideo = () => {
    $video.play();
  }

  const pauseVideo = () => {
    $video.pause();
  }

  const resumeVideo = () => {
    $play.classList.remove('hidden');
  }

  $play.addEventListener('click', () => {
    $play.classList.add('hidden');
    playVideo();
  });

  $video.addEventListener('ended', resumeVideo, false);
}

export default Cliente;
