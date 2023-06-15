<?php
class Playlist {
    private $id;
    private $playlist;
    private $images ;
    private $link ;

    


    public function __construct($id , $playlist, $images, $link){
        $this->id = $id;
        $this->playlist = $playlist;
        $this->images = $images;
        $this->link = $link;

    
    }


// Getter & Setter
    public function getId(){return $this->id;}
    public function getPlaylist(){return $this->playlist;}
    public function getImages(){return $this->images;}
    public function getLink(){return $this->link;}


    public function setPlaylist($playlist){$this->playlist = $playlist;}
    public function setImages($images){$this->images = $images;}
    public function setLink($link){$this->link = $link;}

}