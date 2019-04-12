import Masonry from 'masonry-layout';

const Corporativo = () => {
  const $members = document.querySelector('.members');
  const $member = document.querySelectorAll('.member__inner');
  const $memberModal = document.querySelector('.member-modal');
  const $close = document.querySelector('.member-modal__close')
  const $modalName = document.querySelector('.member-modal__name');
  const $modalLastname = document.querySelector('.member-modal__lastname');
  const $modalRole = document.querySelector('.member-modal__role');
  const $modalBio = document.querySelector('.member-modal__bio');
  const $modalTop = document.querySelector('.member-modal__top');
  const $body = document.body;


  const msnry = new Masonry( $members, {
    itemSelector: '.member',
    percentPosition: true,
    columnWidth: '.grid-sizer'
  });

  const getBio = (photo, name, lastname, role, bio) => {
    $memberModal;
    $memberModal.classList.add('visible');
    $body.classList.add('overflow');

    $modalName.innerHTML = name;
    $modalLastname.innerHTML = lastname;
    $modalRole.innerHTML = role;
    $modalBio.innerHTML = bio;
    $modalTop.style.backgroundImage = "url('"+photo+"')";
  }

  $member.forEach(function(e) {
    e.addEventListener('click', function(){
      const photo = this.getAttribute('data-photo');
      const name = this.getAttribute('data-name');
      const lastname = this.getAttribute('data-lastname');
      const role = this.getAttribute('data-role');
      const bio = this.getAttribute('data-bio');
      getBio(photo, name, lastname, role, bio );
    });

    e.addEventListener('mouseover', function() {
     this.querySelector('.member__video').classList.remove('hidden');
    });

    e.addEventListener('mouseleave', function() {
     this.querySelector('.member__video').classList.add('hidden');
    });
  });

  $close.addEventListener('click', function() {
    $memberModal.classList.remove('visible');
     $body.classList.remove('overflow');
  });
}

export default Corporativo;
