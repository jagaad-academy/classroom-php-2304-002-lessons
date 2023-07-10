<?php

interface Storage
{
    public function store(string $pathToImage): bool;
}
interface User
{
    public function createUser(string $userName, string $userEmail);
}

abstract class StorageAbstract implements User
{
    abstract public function storeFromClass(string $pathToImage);
}

class FileStorage extends StorageAbstract
{

    /**
     * @throws Exception
     */
    public function store(string $pathToImage): bool
    {
        if(!move_uploaded_file($_FILES['tmp_folder'], $pathToImage)){
            throw new Exception('We could not to copy a file!');
        }
    }

    public function createUser(string $userName, string $userEmail)
    {
        // TODO: Implement createUser() method.
    }

    public function storeFromClass(string $pathToImage)
    {
        // TODO: Implement storeFromClass() method.
    }
}

class DataBaseStorage implements Storage
{

    /**
     * @throws Exception
     */
    public function store(string $pathToImage): bool
    {
        //save file data into the DB table
    }
}


class CloudStorage implements Storage
{
    public function store(string $pathToImage): bool
    {
        // TODO: Implement store() method.
    }
}

class ImageSaveHandler
{
    protected $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }
    public function save($image)
    {
        return $this->storage->store($image);
    }
}

class ImageSaveHandlerWithoutDI
{
    protected $storage;

    public function __construct(string $storageType)
    {
        $this->storage = $storageType;
    }
    public function save($image)
    {
        switch ($this->storage){
            case 'database':
                $storage = new DataBaseStorage();
                $storage->store($image);
            case 'cloud':
                $storage = new CloudStorage();
                $storage->store($image);
            case 'file':
            default:
                $storage = new FileStorage();
                $storage->store($image);
                break;
        }
    }
}

$image = '/tmp/tmp-image.jpg';

//Dependencies Injection
$storage = new DataBaseStorage();
$handler = new ImageSaveHandler($storage);
$handler->save($image);

//Without Dependencies Injection
$imageHandler = new ImageSaveHandlerWithoutDI('could');
$imageHandler->save($image);

